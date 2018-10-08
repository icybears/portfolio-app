<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Image;
use Validator;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('isPageOwner')->only('editAbout');        
    }
    
    public function show($username){

        $user = User::findByUsernameOrFail($username);

        return view('user.page', compact('user'));
    }

    public function editAbout($username, Request $request) 
    {

        $validator = Validator::make($request->all(), User::$rules);
        
        
        
                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('source', 'editAbout');
                        
                }

        auth()->user()->update([
                        'fullName' => request('fullName'),
                        'occupation' => request('occupation'),
                        'description' => request('description')               
                    ]);

        if(request('image'))
        {
            // $user->setImage(request('image'));
            auth()->user()->setImage(request('image'));
        }

        return redirect('/')->with(['message' => 'Information updated.', 'class' => 'info']);
    }

   public function changePassword($username, Request $request){

    $validator = Validator::make($request->all(),  [
        'newPassword' => 'required|min:8|max:60|confirmed',
    ]);
    
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->with('source', 'changePassword');
            }
   

    if(Hash::check(request('currentPassword'), auth()->user()->password ))
    {
        User::where('id', auth()->id())
            ->update(['password' => bcrypt(request('newPassword'))]);
        
            return redirect('/')->with(
                ['message' =>'Password changed successfully',
                'class' => 'success'
                ]);
    
    } else {
        return redirect('/')->with(
            ['message' =>'Invalid current password',
            'class' => 'warning'
            ]);
    }
   }

   public function changeUsername($username, Request $request)
   {
    $validator = Validator::make($request->all(),  [
        'newUsername' => 'required|min:2|max:30|unique:users,name'
    ]);
    
            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->with('source', 'changeUsername');
            }
   

    if(Hash::check(request('currentPassword'), auth()->user()->password ))
    {
        User::where('id', auth()->id())
            ->update(['name' => request('newUsername')]);
        
            return redirect('/')->with(
                ['message' =>'Username changed successfully',
                'class' => 'success'
                ]);
    
    } else {
        return redirect('/')->with(
            ['message' =>'Invalid current password',
            'class' => 'warning'
            ]);
    }
   }
}
