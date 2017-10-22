<?php

namespace App\Http\Middleware;

use Closure;

class isgerant
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

        if ( session()->get('isGerant') == 1 ){
            return $next($request);
        }

        return redirect(route('home'));

    }
}
