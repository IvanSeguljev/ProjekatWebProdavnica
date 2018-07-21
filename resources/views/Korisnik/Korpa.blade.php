<!doctype html>
@extends('layouts.app')

@section('content')
<body>
    <h2>Korpa</h2>
        <hr style="background-color: gray"/>
        <form action="/Proizvodi/prikazi" method="get">
            <button class="btn btn-success" type="submit">Povratak na kupovinu</button>
        </form>
    <div class="row">
    @foreach($proizvodi as $proizvod)
    <div class="col-md-3">
      <div class="card" style=" width: 100%; display: inline-block; margin: 20px;">
          @if($proizvod->kolicina == 0)
          <span class="badge badge-pill badge-danger" style="position: absolute; width: 40%;left:-5px;top:-5px;">Nema na stanju</span>
          @endif
          <img class="card-img-top" style="height: 150px;" src="{{asset("SlikeProizvoda/".$proizvod->slika)}}" alt="Card image cap">
          <div class="card-body" style="height: 300px">
    <h5 class="card-title">{{$proizvod->naziv}}</h5>
    
    <div style="width: 100%;height: 100px;overflow:auto;"  class="scrollbox">{{$proizvod->opis}}</div>
     <ul class="list-group list-group-flush">
     
    <li class="list-group-item">Cena po komadu: {{$proizvod->cenaPoKomadu}} din.</li>
    <li class="list-group-item">Proizvoda poruceno: <p>{{$proizvod->kolicina}} komada</p></li>
    
  </ul>
  
         
</div>

</div>
        </div>
    @endforeach
   </div>
<div><p>Ukupan iznos za placanje: {{$ukupnaCena}} dinara</p></div>
    </div>
</body>
@endsection