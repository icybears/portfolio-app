<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

    public function editAbout($username) 
    {
        $user = User::findByUsernameOrFail($username);

        
        $this->validate(request(),
		[
			'fullName' => 'min:2|max:60',
            'occupation' => 'max:120',
            'description' => 'max:300',
            'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100,max_width:500,max_height:500'
		
        ]);

        $user->update([
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
