<!doctype html>
@extends('layouts.app')

@section('content')
<body>
    <h2>Vasi racuni</h2>
    <div class="row">
        <div class="col-md-12">
        <table id="tabela" class="display">
            <thead>
                <tr>
            <th>Broj racuna</th>
            <th>Racun izdat</th>
            <th>Ukupan iznos</th>
            <th></th>
            </tr>
            </thead>
            <tbody>
        @foreach($racuni as $racun)
        <tr>
        <td>{{$racun->id}}</td>
        <td>{{$racun->created_at}}</td>
        <td>{{$racun->ukupanIznos}}</td>
        <td class="text-center">
            <form method="post" action="/Korisnik/Racun/StavkeRacuna">
                <input type="hidden" value="{{$racun->id}}" name="id"/>
                <button type="submit" class="btn btn-primary">Prikazi racun</button>
            </form>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatablesSredjivanje.css")}}"/> 
    <script type="text/javascript" src="{{asset("js/datatables.min.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatables.min.css")}}"/> 
     
    <script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tabela').DataTable();
});</script>
   
</body>
@endsection