<!doctype html>
@extends('layouts.app')
@section('content')
<body>
     <div class="card">
                <div class="card-header">{{ __('Izmeni proizvod') }}</div>
                <div class="card-body">
                    <form method="post" action='/Administracija/IzmeniProizvod' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$proizvod->id}}" name="id"/>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Naziv Proizvoda</label></div>
                            <div class="col-md-6"><input value="{{$proizvod->naziv}}" type="text" name="naziv" class=" form-control" placeholder="Unesite naziv proizvoda" id="naziv" required="true"/></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Opis Proizvoda</label></div>
                            <div class="col-md-6"><textarea maxlength="190" rows="6" type="text" name="opis" class=" form-control" placeholder="Unesite opis proizvoda(max 190 slova)" id="opis" required="true">{{$proizvod->opis}}</textarea></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Kategorija proizvoda</label></div>
                                    <div class="col-md-6"> 
                                        <select class="form-control" id="kategorija" name="kategorija">
                                            @foreach($kategorije as $kategorija)
                                            @if($kategorija->id == $proizvod->kategorija_id)
                                            <option value="{{$kategorija->id}}" selected="">{{$kategorija->naziv}}</option>
                                            @else
                                            <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label>Slika proizvoda</label></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input   accept="image/*" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" type="file" name="slika" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Odaberite sliku proizvoda koji dodajete</small>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{asset('/SlikeProizvoda/'.$proizvod->slika)}}" id="blah" alt="Nija izabrana slika"  width="200" height="200" />
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                         <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label for="naziv">Cena po komadu</label></div>
                            <div class="col-md-6"><input type="number" value="{{$proizvod->cenaPoKomadu}}" name="cena" class=" form-control" placeholder="Unesite cenu proizvoda po komadu" id="cena" required="true"/></div>
                        </div>
                        
                           <div class="form-group row">    
                            <div class="col-md-6">
                            <a href="/Administracija/Roba" ><button type="button" class="btn btn-danger form-control">Otkazi izmene</button></a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success form-control" value="Izmeni proizvod"/>
                            </div>
                        </div>
                       
                    </form>
                </div>
     </div>
</body>
@endsection