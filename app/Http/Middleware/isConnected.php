<?php

namespace App\Http\Middleware;

use Closure;

class isConnected
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

        if(Auth::check()){
            return $next($request);
        }

        return redirect('auth.login');
    }
}
