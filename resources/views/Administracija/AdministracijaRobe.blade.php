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
    <table id="tabelaKategorija" class="display">
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
                     <button style="width: 100%"  type="submit" class="btn btn-warning" onclick="return confirm('Da li ste sigurni da zelite da obrisete?')">Obrisi<img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Delete.png')}}"/></button>
                </form>
                        </div>
                    <div class="col-md-6">
                <form method="get" action="{{route('IzmeniKategoriju')}}">
                    
                     <input type="hidden" value="{{$kategorija->id}}" name="id"/>
                     <button style="width: 100%"  type="submit" class="btn btn-primary">Izmeni<img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Edit.png')}}"/></button>
                </form>
                        </div>
                </div>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table><br>
                <form method="get" action="{{route('DodajKategoriju')}}">
                    <button type="submit" class="btn btn-success">Dodaj novu kategoriju <img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Add.png')}}"/></button>
                </form>
    </div>
     <br>
    <h4>Proizvodi</h4>
    <hr style="background-color: gray;"/>
    
    <div class="col-md-12">
        <table id="tabelaProizvodi" class="display">
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Kategorija</th>
                    <th>Kolicina</th>
                    <th>cena</th>
                    <th>Kontrole</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($data['proizvodi'] as $proizvod)
                <tr>
            <td>{{$proizvod->naziv}}</td>
            <td style="overflow: auto; max-width: 400px;">{{$proizvod->opis}}</td>
                @foreach($data['kategorije'] as $kategorija)
                    @if($kategorija->id == $proizvod->kategorija_id)
                    <td>{{$kategorija->naziv}}</td>
                        
                    @endif
                @endforeach
            <td>{{$proizvod->kolicina}}</td>
            <td>{{$proizvod->cenaPoKomadu}}</td>
            <td class="text-center">
                <div class="row">
               <form method="post" action="/Administracija/ObrisiProizvod">
                    {{ csrf_field() }}
                    <div  >
                     <input type="hidden" value="{{$proizvod->id}}" name="id"/>
                     <button  data-toggle="tooltip" title="Obrisi proizvod" data-placement="top" style="background-color: transparent;border: none;" type="submit" onclick="return confirm('Da li ste sigurni da zelite da obrisete?')"><img style="padding: 10%;" width="30px" height="30px"  src="{{asset('ikonice/Delete.png')}}"/></button>
                    </div>
               </form>
                <form method="get" action="/Administracija/IzmeniProizvod">
                    
                    <div >
                     <input type="hidden" value="{{$proizvod->id}}" name="id"/>
                     <button data-toggle="tooltip" title="Izmeni proizvod" data-placement="top" style="background-color: transparent;border: none;" type="submit"><img style="padding: 10%;" width="30px" height="30px"  src="{{asset('ikonice/Edit.png')}}"/></button>
                    </div>
                </form>
                    <form method="get" action="/Administracija/PrikaziProizvod">
                    
                    <div >
                     <input type="hidden" value="{{$proizvod->id}}" name="id"/>
                     <button data-toggle="tooltip" title="Prikazi karticu" data-placement="top" style="background-color: transparent;border: none;" type="submit"><img style="padding: 10%;" width="30px" height="30px"  src="{{asset('ikonice/Details.png')}}"/></button>
                    </div>
                </form>
                    <form method="get" action="/Administracija/DodajNaStanje">
                    
                    <div >
                     <input  type="hidden" value="{{$proizvod->id}}" name="id"/>
                     <button data-toggle="tooltip" title="Dodaj na stanje" data-placement="top" style="background-color: transparent;border: none;" type="submit"><img style="padding: 10%;" width="30px" height="30px"  src="{{asset('ikonice/Add.png')}}"/></button>
                    </div>
                </form>
                    </div>
                
            </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    <form method="get" action="/Administracija/DodajProizvod">
       <button type="submit" class="btn btn-success">Dodaj novi proizvod <img style="margin-left: 5%" width="30px" height="30px"  src="{{asset('ikonice/Add.png')}}"/></button>
    </form>
    </div>
    
    
     <script type="text/javascript" src="{{asset("js/datatables.min.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatables.min.css")}}"/> 
    <link rel="stylesheet" type="text/css" href="{{asset("css/datatablesSredjivanje.css")}}"/> 
    
    <script>$(document).ready(function () {
    $.noConflict();
    var table1 = $('#tabelaProizvodi').DataTable();
    var table2 = $('#tabelaKategorija').DataTable();
    
});
   
    </script>

</body>
@endsection