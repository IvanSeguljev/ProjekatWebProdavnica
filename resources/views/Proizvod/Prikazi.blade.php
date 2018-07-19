<!doctype html>
@extends('layouts.app')

@section('content')
<body>
   
        
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="width:100%;     margin-left: 20px;">
  <b class="navbar-brand">Pretraga</b>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarColor03">
      <form method="get" action="/Proizvodi/prikazi">
    <ul class="navbar-nav mr-auto">
     
        <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pretraga po ceni
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <label>Minimalna cena:</label><input value="{{old('minimalnaCena')}}" type="number" name="minimalnaCena"/>
         
          <div class="dropdown-divider"></div>
          <label>Maksimalna cena:</label><input type="number" name="maksimalnaCena"/>
        </div>
      </li>
      <div style="width:10px;"></div>
      <li class="nav-item">
          <select class="form-control" name="kategorija">
              <option selected="selected" value="0">Pretraga po kategotiji</option>
               @foreach($kategorije as $kategorija)
               <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
               @endforeach
      </select>
      </li>
      <div style="width:10px;"></div>
      <li class="nav-item">
          <div >
          <input  type="checkbox" name="samoNaStanju"/>Prikazi samo proizvode na stanju
          </div>
      </li>
      <div style="width:10px;"></div>
      <li class="nav-item">
      <button  class="btn btn-secondary navbar-btn" type="submit">Pretrazi</button>
      </li>
    </ul>
    </form>
  </div>
    
</nav>
    
    <div class="row">
    @foreach($proizvodi as $proizvod)
    <div class="col-md-4">
      <div class="card" style=" width: 100%; display: inline-block; margin: 20px;">
          @if($proizvod->kolicina == 0)
          <span class="badge badge-pill badge-danger" style="position: absolute; width: 40%;left:-5px;top:-5px;">Nema na stanju</span>
          @endif
          <img class="card-img-top" style="height: 220px;" src="{{asset("SlikeProizvoda/".$proizvod->slika)}}" alt="Card image cap">
          <div class="card-body" style="height: 350px">
    <h5 class="card-title">{{$proizvod->naziv}}</h5>
    
    <div style="width: 100%;height: 100px;overflow:auto;"  class="scrollbox">{{$proizvod->opis}}</div>
     <ul class="list-group list-group-flush">
     
    <li class="list-group-item">Cena: {{$proizvod->cenaPoKomadu}} din.</li>
    <li class="list-group-item">Proizvoda u skladistu: <p>{{$proizvod->kolicina}} komada</p></li>
    
  </ul>
  </div>
</div>
        </div>
    @endforeach
   </div>
    <div class="row">
        <div class="col-md-12" style="margin-left: 20px;">
    {{ $proizvodi->links() }}
    </div>
    </div>
    
</body>
@endsection