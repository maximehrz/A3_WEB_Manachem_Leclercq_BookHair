@extends('templates.menu')
@include('leformdebg')

@section('content')
    <br>


    <div class="col-lg-8 col-lg-offset-2" style="text-align: center">

        <h1>Vos rendez-vous :</h1>

            @forelse( $rdvs as $rdv )
                <ul>
                    <h2>{{$rdv->magasin_nom }} </h2>
                    <li>{{$rdv->date_debut}} - {{$rdv->date_fin}}</li>


                </ul>
            @empty
                <p>Vous n'avez aucun rendez-vous</p>
            @endforelse

    </div>

@endsection
