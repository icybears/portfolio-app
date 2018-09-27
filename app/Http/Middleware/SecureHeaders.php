<?php

namespace App\Http\Middleware;

use Closure;

class SecureHeaders
{
  
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        $response->header('Server', 'Commodore 64')
                ->header('X-Powered-By', 'Electricity');
        
        return $response;
    }
}
