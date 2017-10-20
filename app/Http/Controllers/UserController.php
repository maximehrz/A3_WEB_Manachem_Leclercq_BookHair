<?php

namespace App\Http\Controllers;

use App\User;
use App\Ville;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $ville = Ville::all();
        return view('user.adduser', ['villes'=>$ville], ['gerant'=>0] );
    }

    /**
     * Show the form for creating a new gerant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_gerant(){
        $ville = Ville::all();
        return view('user.adduser', ['villes'=>$ville], ['gerant'=>1] );
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
                'email'=>'required|string|email|max:255|unique:users',
                'tel'=>'required|max:10|min:10',
                'password'=>'required|string|min:6|confirmed',
                'ville'=>'required',
            ],
            [
                'name.required' => 'Le titre est obligatoire',
                'email.required' => 'Le mail est obligatoire',
                'tel.required' => 'La date de début est obligatoire',
                'password.required' => 'Le mot de passe est obligatoire',
                'ville.required' => 'La ville est obligatoire',
            ]);

            User::create([
                'ville_id' => $request->ville,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_gerant' => $request->gerant === '1' ?  true : false,

            ]);

            return redirect(route('login'));




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
