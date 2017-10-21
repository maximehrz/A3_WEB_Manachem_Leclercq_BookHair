@extends('templates.menu')
@include('leformdebg')

@section('content')

    <div class="panel-body">
        <form class="form-horizontal" method="POST"  action="{{ route('magasin.store') }}">
            {{ csrf_field() }}

            <h1 style="text-align: center; margin-bottom:75px;">Gestion de votre boutique</h1>
            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nom de la boutique</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="nom" placeholder="{{$magasin->nom}}" value=" {{$magasin->nom}}" required autofocus>
                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Numéro de télèphone</label>

                <div class="col-md-6">
                    <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required>

                    @if ($errors->has('tel'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Adresse de la boutique</label>

                <div class="col-md-6">
                    <input id="tel" type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required>

                    @if ($errors->has('adresse'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group ">
                <label for="email" class="col-md-4 control-label">Logo de la boutique</label>

                <div class="col-md-6">
                    <input type="file" name="logo" value="default.png" class="form-control" />


                </div>
            </div>



            <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Code Postale de la boutique</label>

                <div class="col-md-6">
                    <input id="tel" type="text" class="form-control" name="cp" value="{{ old('cp') }}" required>

                    @if ($errors->has('cp'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('cp') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Sauvegarder votre boutique
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
