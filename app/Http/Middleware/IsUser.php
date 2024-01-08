<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{

    public function handle(Request $request, Closure $next)
    {
        if(strtolower(auth()->user()->role) == 'user'){
            return $next($request);
        }
        return abort(403,'Access Denied');
    }
}
