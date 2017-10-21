<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isGerantMenu
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
        if (Auth::check()){
            session()->put('isGerant',Auth::user()->is_gerant );
        }
        else {
            session()->put('isGerant', '0');

        }
        return $next($request);
    }
}
