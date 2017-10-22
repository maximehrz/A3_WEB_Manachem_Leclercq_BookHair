@extends('templates.menu')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">Création d'un nouveau coiffeur</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('coiffeur.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Nom du coiffeur</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control"  name="nom" value="{{ old('nom') }}" required autofocus>

                                    @if ($errors->has('nom'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Type de client</label>

                                <div class="col-md-6">


                                    <label class="radio-inline"><input type="radio" checked   name="type"  value="1">Femme</label>
                                    <br/>
                                    <label class="radio-inline"><input type="radio"   name="type" value="2">Homme</label>


                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Création du coiffeur
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
