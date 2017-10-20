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
        $Magasin = Magasin::where('gerant_id','=' , Auth::user()->id );


        if(Auth::check() && Auth::user()->isGerant == "1" && $Magasin == NULL ){
            return redirect( route('magasin.create'));
        }
        
        return $next($request);
       
    }
}
