<?php

namespace App\Http\Middleware;

use App\Magasin;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        if(Auth::check()) {

            $id = Auth::user()->id;
            $Magasin = Magasin::where('gerant_id', '=', $id);

            if (Auth::check() && Auth::user()->isGerant == "1" && $Magasin == NULL) {
                return redirect(route('magasin.create'));
            }
            
        }
        return $next($request);
       
    }
}
