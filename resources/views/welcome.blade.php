@extends('templates.menu')

@section('content')

    <div id="contentlanding">
        <img id="meufdufond" src="/img/meufdufond.jpg" alt="">
        <h2 id="slogan">Prennez rendez-vous chez votre coiffeur.</h2>
        <div id="leformdebg" class="">
            <form class="" action="" method="post">
                <div id="nom" class="">
                    <label for="">Nom ?</label>
                    <br>
                    <input type="text" name="ou" value="" placeholder="Hair...">
                </div>
                <div id="ou" class="">
                    <label for="">Où ?</label>
                    <br>
                    <input type="text" name="ou" value="" placeholder="Ville, Code Postal, ...">
                </div>
                <div id="quand" class="">
                    <label for="">Quand ?</label>
                    <br>
                    <input type="text" name="quand" value="" placeholder="Selectionner une date ...">
                </div>
                <div id="btrecherche">
                    <input type="submit" name="" value="Rechercher">
                </div>
            </form>
        </div>
    </div>

@endsection



