<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function show($username){

        $user = User::where('name', $username)->firstOrFail();

        return view('test', compact('user'));
    }
}
