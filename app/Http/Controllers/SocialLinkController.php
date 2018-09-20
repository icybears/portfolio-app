<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SocialLink;

class SocialLinkController extends Controller
{
    public function __construct()
    {
        return  $this->middleware('isPageOwner');
    }
    public function store($username)
    {
       $user =  User::findByUsernameOrFail($username);
    
       $socialLink = new SocialLink([
                    'label' => request('label'),
                    'url' => request('url')
                    ]);
        
       $user->socialLinks()->save( $socialLink );

       return redirect('/');
    }

    public function destroy($username, $linkId)
    {
        $user =  User::findByUsernameOrFail($username);

        $user->socialLinks()->where('id', $linkId)->delete();

        return redirect('/');
    }
}
