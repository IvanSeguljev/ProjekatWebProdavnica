<!doctype html>
@extends('layouts.app')
@section('content')
    <body>
        <div class="col-md-12">
            <div class="jumbotron">
                @guest
                <h1 class="display-3">Dobro Dosli</h1>
                <p class="lead">Dobro dosli u web prodavnicu Mili Kralj(mK)</p>
                <hr class="my-4">
                <p>mK se vec nekoliko meseci bavi internet prodajom elektronskih komponenti. Ako zelite da kupite komponente ili da pogledate nas asortiman, 
                ulogujte se, ako zelite da saznate vise o nama, kliknite na dugme O nama</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/ONama" role="button">O nama</a>
                    <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <p>Ako nemate nalog, napravite ga, brzo je, jednostavno i besplatno.</p>
                    <a class="btn btn-primary btn-lg" href="/register" role="button">Napravi novi nalog</a>
                 </p>
                 @else
                 @if(Auth::user()->role == 'Korisnik')
                  <h1 class="display-3">Dobro Dosli {{Auth::user()->name}}</h1>
                <p class="lead">Dobro dosli u web prodavnicu Mili Kralj(mK)</p>
                <hr class="my-4">
                <p>Dobro dosli u web prodavnicu mK, drago nam je da ste ponovo tu</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href='/Proizvodi/prikazi' role="button">Proizvodi</a>
                    <a class="btn btn-primary btn-lg" href="/Korisnik/KorpaKorisnika" role="button">Moja korpa</a>
                
                    <a class="btn btn-primary btn-lg" href="/Korisnik/NalogKorisnika" role="button">Moj nalog</a>
                 </p>
                 <p>Vi i jos {{$bk-1}} korisnika ste omogucili poslovanje ove prodavnice</p>
                 @else
                <h1 class="display-3">Dobro Dosli, administratore {{Auth::user()->name}}</h1>
                <p class="lead">Dobro dosli u web prodavnicu Mili Kralj, dosadasnja zarada je: {{$ukzar}}</p>
                <p>Broj registrovanih korisnika: {{$bk}}</p>
                <hr class="my-4">
                
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href='/Administracija/Korisnici' role="button">Administracija korisnika</a>
                    <a class="btn btn-primary btn-lg" href='/Administracija/Roba' role="button">Administracija robe</a>
                
                    <a class="btn btn-primary btn-lg" href="/Korisnik/NalogKorisnika" role="button">Moj nalog</a>
                 </p>
                 
                 @endif
                 @endguest
            </div>
        </div>
<div id="demo" class="carousel slide" data-ride="carousel">
<div class="col-md-12">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="carousel-caption">
                <h3>Veliki asortiman komponenti</h3>               
        </div>
        <img src="{{asset("Slike/Carousel1.jpg")}}" alt="Los Angeles" style="width: 100%;height: 600px;">
    </div>
    <div class="carousel-item">
        <div class="carousel-caption">
                <h3>Elektrotehnicarska oprema</h3>               
        </div>
      <img src="{{asset("Slike/Carousel2.jpg")}}" alt="Chicago" style="width: 100%;height: 600px;">
    </div>
    <div class="carousel-item">
        <div class="carousel-caption">
                <h3>Pokloni za vase najdraze</h3>               
        </div>
      <img src="{{asset("Slike/Carousel3.png")}}" alt="New York" style="width: 100%;height: 600px;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
    </body>
@endsection
