<!doctype html>
@extends('layouts.app')
@section('content')
<body

    <div class="col-md-12">
        <h2>Administracija korisnika</h2>
        <hr>
    <table id="tabela" class="display">
    <thead>
        <tr>
            <th>Ime</th>
            <th>Mail</th>
            <th>Uloga</th>
            <th>Stanje na racunu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->stanjeNaRacunu}}</td>
            <td>
                
                <div class="row">
                   
                    <div class="col-md-4">
            <form method="get" action="{{ action('AdministracijaController@NalogKorisnika') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button title="Pogledaj nalog" style="background-color: transparent;" type="submit" class="btn btn-primary" ><span><img  width="25px" height="25px"  src="{{asset('ikonice/Details.png')}}"/></span></button>
                </form>
                    </div>
                     <div class="col-md-4">
                <form method="post" action="{{ action('AdministracijaController@BrisanjeKorisnika') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button title="Obrisi" style="background-color: transparent;" type="submit" class="btn btn-warning" onclick="return confirm('jeste li sigurni da zelite da obrisete ovog korisnika?')"><img  width="25px" height="25px"  src="{{asset('ikonice/Delete.png')}}"/></button>
                </form>
                    </div>
                    @if($user->role=='Administrator')
                    <div class="col-md-4">
                <form method="post" action="/Administracija/Promote">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button title="Demote" style="background-color: transparent;" type="submit" class="btn btn-light" onclick="return confirm('jeste li sigurni da ovog ovog korisnika zelite da postavite na ulogu korisnika?')"><img  width="25px" height="25px"  src="{{asset('ikonice/Demote.png')}}"/></button>
                </form>
                    </div>
                    @else
                    <div class="col-md-4">
                <form method="post" action="/Administracija/Promote">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button title="Promote" style="background-color: transparent;"  type="submit" class="btn btn-light" onclick="return confirm('jeste li sigurni da zelite da postavite ovog korisnika za administratora?')"><img  width="25px" height="25px"  src="{{asset('ikonice/Promote.png')}}"/></button>
                </form>
                    </div>
                    @endif
                 </div>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
        </div>
    <!-- datatables skripte is css -->
    
    <script type="text/javascript" src="{{asset("js/datatables.min.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatables.min.css")}}"/> 
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatablesSredjivanje.css")}}"/> 
    <script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tabela').DataTable();
});</script>
</body>
@endsection