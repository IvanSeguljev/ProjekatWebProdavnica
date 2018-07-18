<?php

namespace App\Http\Controllers;

use App\User;
use App\Kategorija;
use App\Proizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdministracijaController extends Controller
{
    public function ListaKorisnika()
    {
        $users = User::all()->except(Auth::user()->id);
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
        $proizvodi = Proizvod::get(['id','naziv','opis','kategorija_id','cenaPoKomadu','kolicina']);
        $data = ['kategorije'=>$kategorije,'proizvodi'=>$proizvodi];
        
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
    
    public function DodajProizvod()
    {
        $kategorije = Kategorija::all();
        $data = ['kategorije' => $kategorije];
        return view('Administracija.DodavanjeProizvoda')->with('data',$data);
    }
    public function DodavanjeProizvoda(Request $req)
    {
        $photoName = time().'.'.$req->slika->getClientOriginalExtension();
        $req->slika->move(public_path('SlikeProizvoda'), $photoName);
        $proizvod = new Proizvod();
        $proizvod->naziv = $req->naziv;
        $proizvod->opis = $req->opis;
        $proizvod->kategorija_id = $req->kategorija;
        $proizvod->slika = $photoName;
        $proizvod->kolicina = $req->broj;
        $proizvod->cenaPoKomadu = $req->cena;
        $proizvod->save();
        
        
         return redirect('Administracija/Roba');
    }
    public function ObrisiProizvod(Request $req)
    {
        $proizvod = Proizvod::Find($req->id);
        Storage::delete($proizvod->slika);
        
        Proizvod::destroy([$req->id]);
        
        return redirect('/Administracija/Roba');
    }
    public function IzmenaProizvoda(Request $req)
    {
        $kategorije = Kategorija::all();
        $proizvod = Proizvod::Find($req->id);
        
        return view('Administracija.IzmenaProizvoda')->with('proizvod',$proizvod)->with('kategorije',$kategorije);
    }
    public function IzmeniProizvod(Request $req)
    {
      
        
        $proizvod = Proizvod::Find($req->id);
        
          if($req->slika)
        {
             Storage::delete($proizvod->slika);
             $photoName = time().'.'.$req->slika->getClientOriginalExtension();
             $req->slika->move(public_path('SlikeProizvoda'), $photoName);
             $proizvod->slika = $photoName;
        }
        
        $proizvod->naziv = $req->naziv;
        $proizvod->opis = $req->opis;
        $proizvod->kategorija_id = $req->kategorija;       
        
        $proizvod->save();
        return redirect('/Administracija/Roba');
    }
    public function DodajNaStanje(Request $req)
    {
        return view('Administracija.DodajNaStanje')->with('id',$req->id);
    }
    public function DodavanjeNaStanje(Request $req)
    {
        $proizvod = Proizvod::Find($req->id);
        $proizvod->kolicina += $req->kolicina;
        $proizvod->save();
        return redirect('/Administracija/Roba');
    }
}
