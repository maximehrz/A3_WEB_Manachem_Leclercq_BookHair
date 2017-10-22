@extends('templates.menu')
@include('leformdebg')

@section('content')
<br>
<div id="contentsearch" class="container">
    @if( session()->get('isGerant') == 1 )<h1>Vos rendez-vous</h1> @else  @yield('leformdebg') @endif
</div>


<div class="col-lg-8 col-lg-offset-2" style="text-align: center">


    @if( session()->get('isGerant') == 1 )

    @forelse( $rdvs as $rdv )
        <ul>
            <h2>{{$rdv->client_nom}} </h2>
            <li>{{$rdv->date_debut}} - {{$rdv->date_fin}}</li>


        </ul>
    @empty
        <p>Vous n'avez aucun rendez-vous</p>
    @endforelse
    @endif
</div>

@endsection
