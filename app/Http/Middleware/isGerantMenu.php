<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            if (Auth::user()->is_gerant == 1){
                $magasinId = DB::table('magasins')
                    ->where('gerant_id', '=', Auth::user()->id)
                    ->first();

                session()->put('idMagasin', $magasinId);
            }
        }
        else {
            session()->put('isGerant', '0');

        }
        return $next($request);
    }
}
