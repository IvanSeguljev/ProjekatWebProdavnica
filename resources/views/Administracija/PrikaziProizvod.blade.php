<!doctype html>
@extends('layouts.app')
@section('content')
<div class="text-center col-md-4 offset-4">
    <div class="card" style=" width: 18rem; display: inline-block;">
        <img class="card-img-top" src="{{asset("SlikeProizvoda/".$proizvod->slika)}}"alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$proizvod->naziv}}</h5>
    
    <p class="card-text">{{$proizvod->opis}}</p>
     <ul class="list-group list-group-flush">
     
    <li class="list-group-item">Cena: {{$proizvod->cenaPoKomadu}} din.</li>
    <li class="list-group-item">Proizvoda u skladistu: <p>{{$proizvod->kolicina}} komada</p></li>
    
  </ul>
  </div>
</div>
 
    <br>
    
</div>
<a href="/Administracija/Roba" ><button type="button" class="btn btn-danger form-control col-md-4 offset-4">Povratak na pregled proizvoda</button></a>
@endsection