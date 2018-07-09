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
            <th>dugme</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->stanjeNaRacunu}}</td>
            <td>Row 1 Data 1</td>
        </tr>
        @endforeach
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 1</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 1</td>
        </tr>
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