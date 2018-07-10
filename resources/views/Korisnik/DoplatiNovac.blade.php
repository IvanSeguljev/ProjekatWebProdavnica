<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <h1>Doplata novca na racun</h1>
    <form method="post" action="{{route('DoplatiNovac')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input id="iznos" type="text" placeholder="Unesite iznos za doplatu" name="iznos">
        </div>
        <input type="button" value="Doplati" class="btn btn-success" name="dugme" onclick="return Proveri()"/>
    </form>
    <script>
        function Proveri()
        {
            var regex = /^[0-9]+(\.[0-9]+)?$/;
            var iznos = document.getElementById("iznos").value;
            if(regex.test(iznos))
            {
                alert('dobar');
            }
            else
            {
                alert('ne valja');
            }
        }
    </script>
</body>
@endsection