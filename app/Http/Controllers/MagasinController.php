<?php

namespace App\Http\Controllers;

use App\Coiffeur;
use App\Magasin;
use App\Tache;
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

        $lundi = [ 0, '08:00' , '12:00' , '14:00' , '17:00' ] ;
        $mardi = [1 , '08:00' , '12:00' , '14:00' , '17:00' ] ;
        $mercredi = [1 , '08:00' , '12:00' , '14:00' , '17:00' ] ;
        $jeudi = [ 1 ,'08:00', '12:00' , '14:00' , '17:00' ] ;
        $vendredi = [1 , '08:00', '12:00' , '14:00' , '17:00' ] ;
        $samedi = [ 1 ,'08:00' , '12:00' , '14:00' , '17:00' ] ;
        $dimanche = [ 0 ,'08:00' , '12:00' , '14:00' , '17:00' ] ;

        $arrayHorraire = [ $lundi , $mardi , $mercredi , $jeudi , $vendredi , $samedi , $dimanche ];
        $arrayHorraire = serialize ( $arrayHorraire );

        Magasin::create([
            'nom' => $request->name,
            'gerant_id'=> $request->idGerant,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'cp' => $request->cp,
            'logo' => 'default.png',
            'horraire' => $arrayHorraire,
        ]);

        $id = Auth::User()->id;

        $id_mag = DB::table('magasins')
            ->where('gerant_id', '=', $id )
            ->first();

        Tache::create([
            'nom' => 'Coupe basique',
            'magasin_id'=> $id_mag->id,
            'coef_temps' => 1,
            'desc' => "Shampoing + Coupe de cheuveux",
            'prix' => "20",
        ]);

        Coiffeur::create([
            'nom' => 'Coiffeur',
            'magasin_id'=> $id_mag->id,
            'sexe' => 0,
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

        $horraire = unserialize ($magasin->horraire);

        return view('magasin.gestion',['magasin'=>$magasin,'coiffeurs'=>$coiffeur,'taches'=>$tache,'horraires'=>$horraire]);
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
    public function update_table(Request $request)
    {
        $Boutique = session()->get('idMagasin');

        $this->validate($request,
            [
                'nom'=>'required|string|max:255',
                'tel'=>'required|max:10|min:10',
                'adresse'=>'required',
                'cp'=>'required',
                'type'=>'required',

            ]);

        $lundi = [$request->lundi_f , $request->lundi_m_o , $request->lundi_m_f , $request->lundi_a_o , $request->lundi_a_f ] ;
        $mardi = [$request->mardi_f , $request->mardi_m_o , $request->mardi_m_f , $request->mardi_a_o , $request->mardi_a_f ] ;
        $mercredi = [$request->mercredi_f , $request->mercredi_m_o , $request->mercredi_m_f , $request->mercredi_a_o , $request->mercredi_a_f ] ;
        $jeudi = [ $request->jeudi_f ,$request->jeudi_m_o , $request->jeudi_m_f , $request->jeudi_a_o , $request->jeudi_a_f ] ;
        $vendredi = [$request->vendredi_f , $request->vendredi_m_o , $request->vendredi_m_f , $request->vendredi_a_o , $request->vendredi_a_f ] ;
        $samedi = [ $request->samedi_f ,$request->samedi_m_o , $request->samedi_m_f , $request->samedi_a_o , $request->samedi_a_f ] ;
        $dimanche = [ $request->dimanche_f ,$request->dimanche_m_o , $request->dimanche_m_f , $request->dimanche_a_o , $request->dimanche_a_f ] ;


        $arrayHorraire = [ $lundi , $mardi , $mercredi , $jeudi , $vendredi , $samedi , $dimanche ];
        $arrayHorraire = serialize ( $arrayHorraire );

        DB::table('magasins')
                ->where('id', $Boutique->id)
                ->update(array(
                    'nom' => $request->nom,
                    'type_client'=> $request->type,
                    'tel' => $request->tel,
                    'adresse' => $request->adresse,
                    'cp' => $request->cp,
                    'logo' => 'default.png',
                    'horraire' => $arrayHorraire
                ));

            
        return redirect(route('gestion.magasin'));
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
