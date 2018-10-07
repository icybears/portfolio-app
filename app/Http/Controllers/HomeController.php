<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check())
        {
            // $user = User::find(auth()->id());
            // return view('user.page', compact('user'));
            return redirect(auth()->user()->getUsername());
        } else {
            return view('landing');
        }
   
    }
}
