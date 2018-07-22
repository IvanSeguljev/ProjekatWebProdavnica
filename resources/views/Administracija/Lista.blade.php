<!doctype html>
@extends('layouts.app')
@section('content')
<body

    <div class="col-md-12">
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
                    <div class="col-md-6">
                <form method="post" action="{{ action('AdministracijaController@BrisanjeKorisnika') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button style="width: 100%" type="submit" class="btn btn-warning" onclick="return confirm('jeste li sigurni da zelite da obrisete ovog korisnika?')">Obrisi<img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Delete.png')}}"/></button>
                </form>
                    </div>
                    <div class="col-md-6">
            <form method="get" action="{{ action('AdministracijaController@NalogKorisnika') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$user->id}}" name="id"/>
                    <button style="width: 100%" type="submit" class="btn btn-primary" >NalogKorisnika<img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Details.png')}}"/></button>
                </form>
                    </div>
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