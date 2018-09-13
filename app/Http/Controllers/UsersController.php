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

        dd(request());
    }

   
}
