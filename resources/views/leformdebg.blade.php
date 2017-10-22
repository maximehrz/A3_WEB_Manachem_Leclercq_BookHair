@section('leformdebg')

<div id="leformdebg" class="">
    <form class="" action="{{route('s.showwhere')}}" method="post">
        {{ csrf_field() }}
        <div id="nom" class="">
            <label for="">Nom ?</label>
            <br>
            <input type="text" name="nom" value="" placeholder="Hair...">
        </div>
        <div id="ou" class="">
            <label for="">Où ?</label>
            <br>
            <input type="text" name="ou" value="" disabled="disabled" placeholder="Ville, Code Postal, ...">
        </div>
        <div id="quand" class="">
            <label for="">Quand ?</label>
            <br>
            <input type="text" name="quand" value="" disabled="disabled"  placeholder="Selectionner une date ...">
        </div>
        <div id="btrecherche">
            <input type="submit" name="" value="Rechercher">
        </div>
    </form>
</div>

@endsection
