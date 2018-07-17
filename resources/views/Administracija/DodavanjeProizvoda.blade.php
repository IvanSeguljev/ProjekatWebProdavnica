<!doctype html>
@extends('layouts.app')
@section('content')
<body>
     <div class="card">
                <div class="card-header">{{ __('DodajProizvod') }}</div>
                <div class="card-body">
                    <form method="post" action='/Administracija/DodajProizvod' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Naziv Proizvoda</label></div>
                            <div class="col-md-6"><input type="text" name="naziv" class=" form-control" placeholder="Unesite naziv proizvoda" id="naziv" required="true"/></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Opis Proizvoda</label></div>
                            <div class="col-md-6"><textarea maxlength="254" rows="6" type="text" name="opis" class=" form-control" placeholder="Unesite opis kategorije(max 254 slova)" id="opis" required="true"></textarea></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Kategorija proizvoda</label></div>
                                    <div class="col-md-6"> 
                                        <select class="form-control" id="kategorija" name="kategorija">
                                            @foreach($data['kategorije'] as $kategorija)
                                            <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Slika proizvoda</label></div>
                            <div class="col-md-6">
                                
                                <input type="file" name="slika" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" required="true">
                                <small id="fileHelp" class="form-text text-muted">Odaberite sliku proizvoda koji dodajete</small>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Broj artikala</label></div>
                            <div class="col-md-6"><input type="number" name="broj" class=" form-control" placeholder="Unesite broj artikala" id="broj" required="true"/></div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label for="naziv">Cena po komadu</label></div>
                            <div class="col-md-6"><input type="number" name="cena" class=" form-control" placeholder="Unesite cenu proizvoda po komadu" id="cena" required="true"/></div>
                        </div>
                        
                           <div class="form-group row">    
                            <div class="col-md-6">
                            <a href="/Administracija/Roba" ><button type="button" class="btn btn-danger form-control">Otkazi dodavanje</button></a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success form-control" onclick="return proveri();" value="Dodaj proizvod"/>
                            </div>
                        </div>
                       
                    </form>
                </div>
     </div>
</body>
@endsection