<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <div class="card">
                <div class="card-header">{{ __('Dodaj na stanje') }}</div>
                <div class="card-body">
                    <form method="post" action="/Administracija/DodajNaStanje">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$id}}" name="id"/>
                    <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label for="naziv">Kolicina</label></div>
                            <div class="col-md-6"><input type="number" name="kolicina" class=" form-control" placeholder="Unesite kolicinu za dodavanje" id="kolicina"/></div>
                        </div>
                        <div class="form-group row">    
                            <div class="col-md-6">
                            <a href="/Administracija/Roba" ><button type="button" class="btn btn-danger form-control">Otkazi dodavanje</button></a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success form-control"  value="Dodaj na stanje"/>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</body>
@endsection