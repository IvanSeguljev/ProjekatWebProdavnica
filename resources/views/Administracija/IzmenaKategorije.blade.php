<!doctype html>
@extends('layouts.app')
@section('content')
<body>
    <div class="card">
                <div class="card-header">{{ __('DodajKategoriju') }}</div>
                <div class="card-body">
                    <form method="post" action="{{route('IzmenaKategorije')}}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$kategorija->id}}" name="id"/>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right"><label for="naziv">Naziv Kategorije</label></div>
                            <div class="col-md-6"><input type="text" name="naziv" value="{{$kategorija->naziv}}" class=" form-control" placeholder="Unesite naziv kategorije" id="naziv"/></div>
                        </div>
                        
                             <div id="alert" class="alert alert-dismissible alert-danger col-md-12" hidden="">             
                                    
                            <strong>Mozete uneti samo velika ili mala slova i brojeve, ime mora sadrzati minimum 2 slova</strong>
                             </div>
                        
                        <div class="form-group row">    
                            <div class="col-md-6">
                            <a href="/Administracija/Roba" ><button type="button" class="btn btn-danger form-control">Otkazi dodavanje</button></a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success form-control" onclick="return proveri();" value="Izmeni kategoriju"/>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
    <script>
        function proveri()
        {
            var naziv = document.getElementById("naziv").value;
            var regex = /^[a-zA-Z-0-9][a-zA-Z-0-9 ]+$/;
            if(regex.test(naziv))
            {
                return true;
            }
            else
            {
                 document.getElementById('alert').removeAttribute('hidden');
                return false;
            }
        }
    </script>
</body>
@endsection