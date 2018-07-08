<!doctype html>
@extends('layouts.Default')
@section('content')
    <body>
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Dobro Dosli</h1>
                <p class="lead">Dobro dosli u web prodavnicu Mili Kralj(mK)</p>
                <hr class="my-4">
                <p>mK se vec nekoliko meseci bavi internet prodajom elektronskih komponenti. Ako zelite da kupite komponente ili da pogledate nas asortiman, 
                ulogujte se, ako nemate nalog, napravite ga, brzo je, jednostavno i besplatno. Ako zelite da saznate vise o nama, kliknite na dugme ispod</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/ONama" role="button">O nama</a>
                 </p>
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
