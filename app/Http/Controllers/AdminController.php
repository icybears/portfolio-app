<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin.index');
    }

    public function users()
    {
        $users = User::paginate(15);

        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return redirect('/admin/users')->with(['message' => 'User created successfully', 'class' => 'success']);
    }
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function updateUser(Request $request)
    {

       $user = auth()->user();

        $user->name = request('name');
        $user->email = request('email');
        if(request('password'))
        {
            $user->password = bcrypt(request('password'));
        }
        $user->premium = (request('premium') == 'true');
        $user->isAdmin = (request('admin') == 'true');

        $user->save();

        return redirect('/admin/users')->with(['message' => 'Information updated.', 'class' => 'info']);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        
        return redirect('/admin/users')->with(['message' => 'User deleted', 'class' => 'success']);
        
    }
}
