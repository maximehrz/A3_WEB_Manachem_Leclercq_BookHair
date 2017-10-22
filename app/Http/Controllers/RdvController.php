<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Rdv_tache;
use App\RdvTache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RdvController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isGerantMenu');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::user()->id;


        $rdvs = DB::table('rdvs')
            ->where('client_id', '=', $id)
            ->get();

        $arraytaches = [];

        foreach ($rdvs as $rdv) {
            $taches = DB::table('rdv_taches')

                ->get();
            array_push($arraytaches, $taches);
        }

        return view('rdv.index', [
            'rdvs' => $rdvs,
            'taches' => $arraytaches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function calendrier_home()
    {
        return redirect(route('home'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calendrier(Request $request)
    {
        $magasin = DB::table('magasins')
            ->where('id', '=', $request->idMagasin)
            ->first();

        $taches = DB::table('taches')
            ->where('magasin_id', '=', $request->idMagasin)
            ->get();

        // dd($magasin);
        // dd($taches);

        return view('rdv.rdv_calendrier', ['magasin' => $magasin, 'taches' => $taches ]) ;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $magasin_nom = DB::table('magasins')
            ->where('id', '=', $request->id_magasin)
            ->first();
        $nom = Auth::user()->name;

        $this->validate($request,
            [
                'tache'=>'required',
                'date'=>'required',
                'time'=>'required',
                'id_magasin'=>'required',
            ]);
        Rdv::create([
            'client_id' => Auth::user()->id,
            'client_nom' => $nom,
            'magasin_id' => $request->id_magasin,
            'magasin_nom' => $magasin_nom->nom,
            'date_debut' => $request->date .' '. $request->time,
            'date_fin' => $request->date .' '. $request->time,
        ]);

        $idRdv = DB::table('rdvs')
            ->orderBy('id')
            ->first();

        $nom_tache = DB::table('taches')
                ->where('nom','=',$request->tache)
                ->get();

        Rdv_Tache::create([
            'rdv_id' => $idRdv->id,
            'tache_nom' => $nom_tache,
            'tache_id' => $request->tache,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
