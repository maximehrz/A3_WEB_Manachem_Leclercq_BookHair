<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth_gerant');
        $this->middleware('isGerantMenu');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $isGerant = Auth::user()->is_gerant;
        $rdvs = 0;
        $arraytaches = 0 ;

        if ($isGerant == 1 ){

            $id = Auth::user()->id;

            $magasin = DB::table('magasins')
                ->where('gerant_id', '=', $id)
                ->first();

            $rdvs = DB::table('rdvs')
                ->where('magasin_id', '=', $magasin->id)
                ->get();

            $arraytaches = [];

            foreach ( $rdvs as $rdv ){
                $taches = DB::table('rdv_taches')
                    ->where('rdv_id' ,'=', $rdv->id)
                    ->first();
                array_push ( $arraytaches , $taches->tache_nom );
            }
           
        }

        return view('home', [
            'isGerant' => $isGerant,
            'rdvs' => $rdvs,
            'taches' => $arraytaches,
        ]);


    }
}
