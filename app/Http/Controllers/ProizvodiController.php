<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proizvod;
use App\Korpa;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Kategorija;
class ProizvodiController extends Controller
{
    
     public function __construct()
    {
        
        $this->middleware('auth');
    }
    
public function Prikazi(Request $req)
{
    $proizvodi = Proizvod::where('id','>',0);
    if($req->minimalnaCena!=null)
    {
    $proizvodi= $proizvodi->where('cenaPoKomadu','>=',$req->minimalnaCena);
    }
    if($req->maksimalnaCena!=null)
    {
    $proizvodi= $proizvodi->where('cenaPoKomadu','<=',$req->maksimalnaCena);
    }
    if($req->kategorija != 0)
    {
        $proizvodi=$proizvodi->where('kategorija_id','=',$req->kategorija);
    }
    if($req->samoNaStanju != null)
    {
        $proizvodi=$proizvodi->where('kolicina','>',0);
    }
    $proizvodi=$proizvodi->paginate(9);
    return view('Proizvod.Prikazi')->with('proizvodi', $proizvodi)->with('kategorije', Kategorija::all())->with('oldsort',$req);
}

public function  DodajUKorpu(Request $req)
{
    
    $proizvodID = $req->id;
    $kolicina = $req->kolicina;
    $postojeci = Korpa::where('user_id', Auth::user()->id);
    $postojeci = $postojeci->where('proizvod_id',$proizvodID);
    if($postojeci->count() == 0)
    {
        $korpa = new Korpa();
        $korpa->user_id=Auth::user()->id;
        $korpa->proizvod_ID = $proizvodID;
        $korpa->kolicina = $kolicina;
        
        $korpa->save();
    }
    else 
    {
        $korpa = $postojeci->firstOrFail();
        $korpa->kolicina += $kolicina;
        $korpa->save();
    }
    $proizvod = Proizvod::find($proizvodID);
    $proizvod->kolicina -= $kolicina;
    $proizvod->save();
    return redirect('/Korisnik/KorpaKorisnika');
}
public function ObrisiIzKorpe(Request $req)
{
    $celaKorpa = User::Find(Auth::user()->id)->korpe->where("proizvod_id",$req->id);
    foreach ($celaKorpa as $k)
    {
        if($k->proizvod_id == $req->id)
        {
            $korpa=$k;
        }
    }
    $proizvod = Proizvod::Find($k->proizvod_id);
    $proizvod->kolicina += $korpa->kolicina;
    $proizvod->save();
    Korpa::destroy([$korpa->id]);
    return redirect('/Korisnik/KorpaKorisnika');
    
}
}

