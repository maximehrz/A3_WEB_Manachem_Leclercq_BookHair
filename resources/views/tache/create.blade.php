@extends('templates.menu')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Création d'un nouveau service</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('tache.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Nom du service</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

                                    @if ($errors->has('nom'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Description du service</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="desc" value="{{ old('desc') }}" required autofocus>
                                    <label>Tips : il est possible de ne pas définir de description </label>
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Prix du service</label>

                                <div class="col-md-6">
                                    <input id="email" type="number" class="form-control" name="prix" value="{{ old('prix') }}" required autofocus>
                                    <label>Tips : il est possible de ne pas définir le prix </label>
                                    @if ($errors->has('prix'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prix') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('temps') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Durée du service en minute</label>

                                <div class="col-md-6">
                                    <input id="email" type="number" step="30" class="form-control" name="temps" value="{{ old('temps') }}" required autofocus>
                                    <label>Tips : il est possible de ne pas définir de temps </label>
                                    @if ($errors->has('temps'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('temps') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Création du service
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
