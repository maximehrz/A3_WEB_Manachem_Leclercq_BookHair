<?php

namespace App\Http\Middleware;

use App\Magasin;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class CreationBoutique
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
        if( Auth::check() ) {

            $id = Auth::user()->id;

            $magasin = DB::table('magasins') ->where('id', '=', $id )->first();

            if ( Auth::user()->isGerant =="1" && $magasin == NULL ) {
                return redirect(route('magasin.create'));
            }
        }
        return $next($request);
    }
}
