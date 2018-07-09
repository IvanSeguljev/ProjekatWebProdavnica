<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <div class="row">
        <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Nalog korisnika {{$user->name}}</h1>
        <hr/>
    </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
    <div class=" col-md-8">
        
        <p class="lead">email: {{$user->email}}</p>
        <p class="lead">Stanje na vasem racunu: {{$user->stanjeNaRacunu}}.din</p>
        
        
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
             <div class="card-header">Header</div>
             <div class="card-body">
                <h4 class="card-title">Primary card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
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
</body>
@endsection
