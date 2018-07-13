<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <h2>Administracija robe</h2>
    <br>
    <br>
    <h4>Kategorije robe</h4>
    <hr style="background-color: gray;"/>
    <div class="col-md-12">
    <table id="tabela" class="display">
    <thead>
        <tr>
            <th>Ime</th>
            <th>Kontrole</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($data['kategorije'] as $kategorija)
        <tr>
            <td>{{$kategorija->naziv}}</td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                <form method="post" action="{{route('BrisanjeKategorije')}}">
                    {{ csrf_field() }}
                    
                     <input type="hidden" value="{{$kategorija->id}}" name="id"/>
                     <button style="width: 100%"  type="submit" class="btn btn-danger" onclick="return confirm('Da li ste sigurni da zelite da obrisete?')">Obrisi</button>
                </form>
                        </div>
                    <div class="col-md-6">
                <form method="get" action="{{route('IzmeniKategoriju')}}">
                    
                     <input type="hidden" value="{{$kategorija->id}}" name="id"/>
                     <button style="width: 100%"  type="submit" class="btn btn-primary">Izmeni</button>
                </form>
                        </div>
                </div>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table><br>
                <form method="get" action="{{route('DodajKategoriju')}}">
                    <button type="submit" class="btn btn-success">Dodaj novu kategoriju</button>
                </form>
    </div>
    
    
    
    
     <script type="text/javascript" src="{{asset("js/datatables.min.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatables.min.css")}}"/> 
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatablesSredjivanje.css")}}"/> 
    <script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tabela').DataTable();
});</script>
</body>
@endsection