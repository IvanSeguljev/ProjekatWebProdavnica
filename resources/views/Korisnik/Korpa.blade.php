<!doctype html>
@extends('layouts.app')

@section('content')
<body>
   @if(session()->has('uspeh'))
   <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Transakcija uspesno obavljena! hvala vam sto poslujete sa nama
</div>
@endif
@if(session()->has('greska'))
   <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Nemate dovoljno novca na racunu, molimo vas doplatite novac na racun, pa pokusajte ponovo
</div>
@endif
    <h2>Korpa</h2>
    <div class="row">
        <form class="col-md-2" action="/Proizvodi/prikazi" method="get">
            <button class="btn btn-success" type="submit">Povratak na kupovinu</button>
        </form>
            @if($proizvodi)
        <form class="col-md-2" action="/Korisnik/Kupi" method="post">
            {{csrf_field()}}
            <button onclick="return confirm('molimo vas potvrdite kupovinu')" class="btn btn-primary" type="submit">Kupi Proizvode</button>
        </form>
            @endif
    </div>
        <hr style="background-color: gray"/>
        
    <div class="row">
    @foreach($proizvodi as $proizvod)
    <div class="col-md-3">
      <div class="card" style=" width: 100%; display: inline-block; margin: 20px;">
          @if($proizvod->kolicina == 0)
          <span class="badge badge-pill badge-danger" style="position: absolute; width: 40%;left:-5px;top:-5px;">Nema na stanju</span>
          @endif
          <img class="card-img-top" style="height: 150px;" src="{{asset("SlikeProizvoda/".$proizvod->slika)}}" alt="Card image cap">
          <div class="card-body" style="height: auto">
    <h5 class="card-title">{{$proizvod->naziv}}</h5>
    
    <div style="width: 100%;height: 100px;overflow:auto;"  class="scrollbox">{{$proizvod->opis}}</div>
     <ul class="list-group list-group-flush">
     
    <li class="list-group-item">Cena po komadu: {{$proizvod->cenaPoKomadu}} din.</li>
    <li class="list-group-item">Proizvoda poruceno: <p>{{$proizvod->kolicina}}</p></li>
    
  </ul>
    <div>
        <form action="/Proizvodi/ObriziIzKorpe" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger col-md-12" onclick="return confirm('Jeste li sigurni da zelite da ovaj proizvod obrisete iz korpe?')" style="margin-top: 10px;">Obrisi iz korpe</button>
            <input value="{{$proizvod->id}}" type="hidden" name="id"/>
        </form>
    </div>
         
</div>

</div>
        </div>
    @endforeach
    @if(!$proizvodi)
    <h1>Vasa korpa je prazna</h1>
    @endif
       </div>
<div><p>Ukupan iznos za placanje: {{$ukupnaCena}} dinara</p></div>
    </div>
</body>
@endsection