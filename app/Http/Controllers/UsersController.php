<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Log;

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
            $user->setImage(request('image'));
        }

        return redirect('/');
    }

   
}
