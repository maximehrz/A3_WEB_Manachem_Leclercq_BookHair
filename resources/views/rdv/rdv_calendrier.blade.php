@extends('templates.menu')
@include('leformdebg')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <h1>Calendrier de réservation - {{ $magasin->nom }}</h1>
            <div class="col-xs-8 col-xs-offset-2">
                <form method="POST" class="form-group" action="{{ route('rdv.store') }}">
                    {{csrf_field()}}
                    <label for="date">De quoi avez vous besoin ?</label>
                    <select name="tache" id="" class="form-control">
                        <option value="0">Selectionnez une tache</option>
                    @foreach($taches as $tache)
                            <option value="{{ $tache->id }}">{{ $tache->nom }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="date">Quand êtes-vous disponible ?</label>
                    <input name="date" type="date" class="form-control">
                    <br>
                    <label for="date">À partir de quelle heure êtes-vous disponible ?</label>
                    <input name="time" type="time" class="form-control">
                    <input name="id_magasin" type="hidden" value="{{ $magasin->id }}">
                    <br>
                    <input class="btn btn-block btn-primary" type="submit" value="Réserver">

                </form>
            </div>
        </div>
    </div>

@endsection
