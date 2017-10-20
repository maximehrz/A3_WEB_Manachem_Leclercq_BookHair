@extends('templates.menu')
@include('leformdebg')

@section('content')
    <br>
    <div id="contentsearch" class="container">
      @yield('leformdebg')
    </div>
    <div class="container">
        <div class="row card">
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <img src="/img/salontest.jpg" alt="">
                </div>
                <div class="col-xs-7">
                    <h3>ImaginHair</h3>
                    <p class="type">Salon de coiffure homme</p>
                    <p class="nbCoiffeur">Coiffeur : 2</p>
                    <br>
                    <br>
                    <br>
                    <p class="adress">7 Rue Huguette Bonvosin, 76200, Dieppe</p>
                </div>
                <div id="btVoirFiche" class="col-xs-2 text-center">
                    <button class="btn btn-primary btn-lg" type="button" name="button">Réserver</button>
                </div>
            </div>
        </div>
        <div class="row card">
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <img src="/img/salontest.jpg" alt="">
                </div>
                <div class="col-xs-7">
                    <h3>ImaginHair</h3>
                    <p class="type">Salon de coiffure homme</p>
                    <br>
                    <br>
                    <br>
                    <p class="adress">7 Rue Huguette Bonvosin, 76200, Dieppe</p>
                </div>
                <div id="btVoirFiche" class="col-xs-2 text-center">
                    <button class="btn btn-primary btn-lg" type="button" name="button">Réserver</button>
                </div>
            </div>
        </div>
        <div class="row card">
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <img src="/img/salontest.jpg" alt="">
                </div>
                <div class="col-xs-7">
                    <h3>ImaginHair</h3>
                    <p class="type">Salon de coiffure homme</p>
                    <br>
                    <br>
                    <br>
                    <p class="adress">7 Rue Huguette Bonvosin, 76200, Dieppe</p>
                </div>
                <div id="btVoirFiche" class="col-xs-2 text-center">
                    <button class="btn btn-primary btn-lg" type="button" name="button">Réserver</button>
                </div>
            </div>
        </div>
    </div>

@endsection
