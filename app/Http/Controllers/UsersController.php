<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    
    public function show($username){

        $user = User::findByUsernameOrFail($username);

        return view('test', compact('user'));
    }

    public function editAbout($username) 
    {
        $user = User::findByUsernameOrFail($username);

        $this->validate(request(),
		[
			'fullName' => 'min:2|max:60',
            'occupation' => 'max:120',
            'description' => 'max:300'
		
        ]);

        $user->update([
                        'fullName' => request('fullName'),
                        'occupation' => request('occupation'),
                        'description' => request('description')
                    ]);

        return redirect('/');
    }

   
}
