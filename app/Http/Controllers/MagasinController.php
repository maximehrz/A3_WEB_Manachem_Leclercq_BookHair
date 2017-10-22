<?php

namespace App\Http\Controllers;

use App\Magasin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id; 
        return view('magasin.addmagasin',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|string|max:255',
                'tel'=>'required|max:10|min:10',
                'adresse'=>'required',
                'cp'=>'required',
                
            ]);

        Magasin::create([
            'nom' => $request->name,
            'gerant_id'=> $request->idGerant,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'cp' => $request->cp,
            'logo' => 'default.png',
        ]);

        return redirect(route('home'));

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
    
    
    public function gestion()
    {
        $id = Auth::user()->id;

        $magasin = DB::table('magasins')
            ->where('gerant_id', '=', $id)
            ->first();
        
        $tache = DB::table('taches')
            ->where('magasin_id', '=', $magasin->id)
            ->get();

        $coiffeur = DB::table('coiffeurs')
            ->where('magasin_id', '=', $magasin->id)
            ->get();


        return view('magasin.gestion',['magasin'=>$magasin,'coiffeurs'=>$coiffeur, 'taches'=>$tache] );
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idBoutique = session()->get('idMagasin');

        $this->validate($request,
            [
                'nom'=>'required|string|max:255',
                'tel'=>'required|max:10|min:10',
                'adresse'=>'required',
                'cp'=>'required',
                'type'=>'required',

            ]);

        $lundi =0 ;
        $mardi =0 ;
        $mercredi =0 ;
        $jeudi =0 ;
        $vendredi =0 ;
        $samedi =0 ;
        $dimanche = 0;


        $arrayHorraire = [ $lundi , $mardi , $mercredi , $jeudi , $vendredi , $samedi , $dimanche ];

            DB::table('magasins')
                ->where('id', $idBoutique)
                ->update(array(
                    'nom' => $request->name,
                    'type'=> $request->type,
                    'tel' => $request->tel,
                    'adresse' => $request->adresse,
                    'cp' => $request->cp,
                    'logo' => 'default.png',
                    'horraire' => $arrayHorraire));





        return redirect(route('home'));
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
