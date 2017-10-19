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
    <h1><span class="glyphicon glyphicon-scissors"></span>BookHair</h1>
    <ul>
        <li><a href="#" id="liencoif">Vous êtes coiffeur ?</a></li>
        <li><a href="#">Inscription</a></li>
        <li><a href="#" class="color">Connexion</a></li>
    </ul>
</div>
@yield('content')
</body>
</html>