<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdministracijaController extends Controller
{
    public function ListaKorisnika()
    {
        $users = User::all();
        return view("Administracija.Lista")->with('users',$users);
    }
    
    public function BrisanjeKorisnika(Request $req)
    {
        $nes = $req->id;
        User::destroy([$nes]);
        return redirect('/Administracija/Korisnici');
    }
    
}
