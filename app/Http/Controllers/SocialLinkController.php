<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SocialLink;

class SocialLinkController extends Controller
{
    public function add($username)
    {
       $user =  User::findByUsernameOrFail($username);
    
       $socialLink = new SocialLink([
                    'label' => request('label'),
                    'url' => request('url')
                    ]);
        
       $user->socialLinks()->save( $socialLink );

       return redirect('/');
    }

    public function remove($username, $linkId)
    {
        $user =  User::findByUsernameOrFail($username);

        $user->socialLinks()->where('id', $linkId)->delete();

        return redirect('/');
    }
}
