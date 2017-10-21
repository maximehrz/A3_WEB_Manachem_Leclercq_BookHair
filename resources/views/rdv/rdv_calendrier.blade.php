@extends('templates.menu')
@include('leformdebg')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <h1>Calendrier de réservation - {{ $magasin->nom }}</h1>

            <div class="col-lg-12" style="border: 1px solid black; height: 700px;">

            </div>
        </div>
    </div>

@endsection
