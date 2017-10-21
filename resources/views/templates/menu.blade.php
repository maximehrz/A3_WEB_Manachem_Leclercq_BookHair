<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookHair</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="menu" class="container-fluid">
    <h1><a href="/"><span class="glyphicon glyphicon-scissors"></span>BookHair</a></h1>
    <div id="menudroite">
        <ul>
            @guest
                <li><a href="{{route('create.gerant')}}" id="liencoif">Vous êtes coiffeur ?</a></li>
                <li><a id="inscription" href="{{route('user.create')}}">Inscription</a></li>
                <li><a href="/login" class="color">Connexion</a></li>
            @else
                @if(session()->get('isGerant') == '1')
                    <li><a id="inscription" href="{{route('gestion.magasin')}}">Ma Boutique</a></li>
                @else
                    <li><a id="inscription" href="#">Mes Rendez-vous</a></li>

                @endif
                    <li class="">
                    <a href="{{ route('logout') }}" class="" role="button" aria-expanded="false"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Déconnexion
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>


                        </li>
                    </ul>
                </li>
            @endguest

        </ul>
    </div>
</div>


@yield('content')
</body>
</html>
