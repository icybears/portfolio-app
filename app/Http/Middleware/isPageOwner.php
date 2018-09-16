<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class isPageOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::findByUsernameOrFail($request->route('username'));

        if(auth()->id() == $user->id){
            return $next($request);
        } else {
            return back();
        }
        
    }
}
