<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotVlogger
{
    public function handle($request, Closure $next, $guard = 'vlogger')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
