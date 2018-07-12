<!doctype html>
@extends('layouts.app')
@section('content')

<br>

<div class="card">
                <div class="card-header">{{ __('Promena sifre') }}</div>
                <div class="card-body">
<form method="post" action="{{route('PromenaSifre')}}" >
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="stariPass" class="col-md-4 col-form-label text-md-right">Stari password</label>
        <div class="col-md-6">
            <input type="password" class="form-control{{ $errors->has('stariPass') ? ' is-invalid' : '' }}" placeholder="Unesite stari password" name="stariPass" id="stariPass" required=""/>
        </div>
         @if ($errors->has('stariPass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stariPass') }}</strong>
                                    </span>
                                @endif
    </div>
    <hr style="background-color: darkviolet">
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">novi password</label>
        <div class="col-md-6">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Unesite novi password" name="password" id="password" required=""/>
         @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Potvrda novog passworda</label>
        <div class="col-md-6">
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Potvrdite novi password" name="password_confirmation" id="password-confirm" required=""/>
         @if ($errors->has('potvrdaNovi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
        </div>
    </div>
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary" >Promeni sifru</button>
    </div>
    @foreach ($errors->all() as $error)
    <li style="color: red;">{{ $error }}</li>
            @endforeach
</form>
                </div>
</div>
@endsection