@extends('templates.menu')
@include('leformdebg')

@section('content')

    <div id="contentlanding">
        <img id="meufdufond" src="/img/meufdufond.jpg" alt="">
        <h2 id="slogan">Prenez rendez-vous chez votre coiffeur.</h2>
        @yield('leformdebg')
    </div>

@endsection
