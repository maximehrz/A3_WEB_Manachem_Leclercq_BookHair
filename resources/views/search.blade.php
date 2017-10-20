@extends('templates.menu')
@include('leformdebg')

@section('content')
    <br>
    <div id="contentsearch" class="container">
      @yield('leformdebg')
    </div>
    <div class="container">
        @foreach( $magasins as $magasin)
        <div class="row card">
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <img src="/img/salontest.jpg" alt="">
                </div>
                <div class="col-xs-7">
                    <h3>{{$magasin->nom}}</h3>
                    <p class="type">Salon de coiffure homme</p>
                    <p class="nbCoiffeur">Coiffeur : 2</p>
                    <p class="tache">5 tâches disponibles</p>
                    <p>€€ - €€€</p>
                    <p class="adress">7 Rue Huguette Bonvosin, 76200, Dieppe</p>
                </div>
                <div id="btVoirFiche" class="col-xs-2 text-center">
                    <button class="btn btn-primary btn-lg" type="button" name="button">Réserver</button>
                </div>
            </div>
        </div>
        @endforeach

    </div>

@endsection
