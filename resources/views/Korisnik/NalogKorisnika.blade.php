<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <div class="row">
        
    <div class="col-md-8">
        <h1>Nalog korisnika {{$data['user']->name}}</h1>
        <hr/>
    </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
    <div class=" col-md-8">
        
        <p class="lead">email: {{$data['user']->email}}</p>
        <p class="lead">Stanje na racunu: {{$data['user']->stanjeNaRacunu}}.din</p>
        
        
        </div>
        
    </div>
    <br>
    <br>
    <br>
    <h4>Transakcije</h4>
    <hr style="background-color: white"/>
     <div class="col-md-12">
       <table id="tabela" class="display">
    <thead>
        <tr>
            <th>Datum</th>
            <th>Komentar</th>
            <th>Iznos</th>            
        </tr>
    </thead>
    <tbody>
        @foreach($data['Transakcije'] as $transakcija)
        <tr>
            <td>{{$transakcija->created_at}}</td><td>{{$transakcija->komentar}}</td><td>{{$transakcija->iznos}}</td>
         </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    <br>
        @if(Auth::user()->id== $data["user"]->id)
        
        <div class="col-md-4">
        <div class="card text-white bg-primary mb-3  " style="max-width: 20rem;">
             <div class="card-header">Dodaj novac na racun</div>
             <div class="card-body">
                <h4 class="card-title">Dodaj novac</h4>
                <p class="card-text">Kliknite na dugme ispod da biste doplatili novac na vas racun</p>
                <hr>
                
                <input type="submit" class="btn btn-success" value="Doplati" data-toggle="modal" data-target="#myModal"/>
                
                
            </div>
        </div>
        </div>
    <h4 style="padding-top: 20px;">Nalog</h4>
            <hr style="background-color: white"/>
      <div class="row">
        <div class="col-md-4">
        <div class="card text-white bg-danger mb-3  " style="max-width: 20rem;">
            <div class="card-header">Obrisi nalog</div>
            <div class="card-body">
                <h4 class="card-title">Obrisi korisnicki nalog</h4>
                <p class="card-text">Pazljivo razmislite o ovoj odluci, akcija je nepovratna, a sav neiskoriscen novac sa vaseg racuna ide u dobrotvorne svrhe!</p>
                <hr>
                <form method="post" action="{{route('ObrisiNalog')}}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-warning" value="Obrisi nalog" onclick="return confirm('jeste li sigurni da zelite da obrisete svoj nalog?')"/>
                </form>
            </div>
        </div>
        </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
                    <div class="card-header">Promeni sifru</div>
                    <div class="card-body">
                        <h4 class="card-title">Promeni sifru</h4>
                        <p class="card-text">Kliknite na dugme ispod kako bi ste promenili sifru</p>
                         <hr>
                <form method="get" action="{{route('PromeniSifru')}}">
                
                <input type="submit" class="btn btn-danger" value="Promeni sifru"/>
                </form>
                    </div>
                </div>
            </div>
         </div>
   
            
            
            
            <!--modalna-->
            <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Doplati novac na racun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
        
      <div class="modal-body">       
        <form method="post" action="{{route('DoplatiNovac')}}">
        {{ csrf_field() }}
        <div class="form-group" style="width:100%;">
            <input id="iznos" type="text" placeholder="Unesite iznos za doplatu" name="iznos" style="width: 100%">
            <br>
            <div id="alert" class="alert alert-dismissible alert-danger" hidden="">             
                
                <strong>Mozete uneti samo brojeve, sa opcionim decimalnim zarezom(123 ili 123.45)</strong>
            </div>
        </div>
        <input type="submit" value="Doplati" class="btn btn-success" name="dugme" onclick="return Proveri()"/>
    </form>
      </div>
        
        
      
        </div>
        </div>
        </div>
            @endif
            <script type="text/javascript" src="{{asset("js/datatables.min.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatables.min.css")}}"/> 
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatablesSredjivanje.css")}}"/> 
    <script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tabela').DataTable();
});</script>
             <script>
        function Proveri()
        {
            var regex = /^[0-9]+(\.[0-9]+)?$/;
            var iznos = document.getElementById("iznos").value;
            if(regex.test(iznos))
            {
                return true;
            }
            else
            {
                document.getElementById('alert').removeAttribute('hidden');
                return false;
            }
        }
    </script>
</body>
@endsection
