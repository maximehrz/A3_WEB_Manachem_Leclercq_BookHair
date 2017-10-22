<?php

namespace App\Http\Controllers;

use App\Coiffeur;
use App\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoiffeurController extends Controller
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
        return view('coiffeur.create');
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
                'nom'=>'required|string|max:255',


            ]);

        $Boutique = session()->get('idMagasin');

        Coiffeur::create([
            'nom' => $request->nom,
            'magasin_id' => $Boutique->id ,
            'sexe' => $request->type,
        ]);

        return redirect(route('gestion.magasin'));
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
        DB::table('coiffeurs')
            ->where('id', '=', $id)
            ->delete();

        return redirect(route('gestion.magasin'));
    }
}
