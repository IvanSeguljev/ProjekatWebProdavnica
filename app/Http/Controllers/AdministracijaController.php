<?php

namespace App\Http\Controllers;

use App\User;
use App\Kategorija;
use App\Proizvod;
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
    
    public function NalogKorisnika(Request $req)
    {
        $user = User::Find($req->id);
        $trans = $user->Transakcije;
        $data = ['user' => $user,'Transakcije' => $trans];
        
        return view('Korisnik.NalogKorisnika')->with('data',$data);
    }
    
    public function AdministracijaRobe()
    {
        $kategorije = Kategorija::all();
        $data = ['kategorije'=>$kategorije];
        return view('Administracija.AdministracijaRobe')->with('data',$data);
    }
    
    public function DodajKategoriju()
    {
        return view('Administracija.DodajKategoriju');
    }
    
    public function DodavanjeKategorije(Request $req)
    {
        $naziv = $req->naziv;
        $kategorija = new Kategorija();
        $kategorija->naziv = $naziv;
        $kategorija->save();
        return redirect('/Administracija/Roba');
    }
    
    public function BrisanjeKategorije(Request $req)
    {
        $id = $req->id;
        $kategorija = new Kategorija();
        $kategorija::destroy([$id]);
        return redirect('/Administracija/Roba');
    }
    public function Izmenikategoriju(Request $req)
    {
        $id = $req->id;
        $kategorija = Kategorija::Find($id);
        return view('Administracija.IzmenaKategorije')->with('kategorija',$kategorija);
    }
    public function IzmenaKategorije(Request $req)
    {
        $id = $req->id;
         $kategorija = Kategorija::Find($id);
         $kategorija->naziv = $req->naziv;
         $kategorija->save();
         return redirect('/Administracija/Roba');
    }
}
