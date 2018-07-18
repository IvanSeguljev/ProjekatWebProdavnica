<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <div class="row">
    @foreach($proizvodi as $proizvod)
    <div class="col-md-4">
      <div class="card" style=" width: 100%; display: inline-block; margin: 20px;">
          <img class="card-img-top" style="height: 220px;" src="{{asset("SlikeProizvoda/".$proizvod->slika)}}" alt="Card image cap">
          <div class="card-body" style="height: 300px">
    <h5 class="card-title">{{$proizvod->naziv}}</h5>
    
    <p class="card-text">{{$proizvod->opis}}</p>
     <ul class="list-group list-group-flush">
     
    <li class="list-group-item">Cena: {{$proizvod->cenaPoKomadu}} din.</li>
    <li class="list-group-item">Proizvoda u skladistu: <p>{{$proizvod->kolicina}} komada</p></li>
    
  </ul>
  </div>
</div>
        </div>
    @endforeach
   </div>
</body>
@endsection