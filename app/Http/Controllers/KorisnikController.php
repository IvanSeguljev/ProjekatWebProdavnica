<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Transakcija;

class KorisnikController extends Controller
{
    public function NalogKorisnika()
    {
        $user = Auth::user();
        return view('Korisnik.NalogKorisnika')->with('user',$user);
    }
      public function ObrisiNalog()
    {
        $user = Auth::user();
        User::destroy($user->id);
        Auth::logout();
        
        return redirect("/");
    }
    public function DoplatiNovac(Request $doplata)
    {
        $user = User::Find(Auth::user()->id);
        $iznos = $doplata->iznos;
        $Transakcija = new Transakcija;
        $Transakcija->iznos = $iznos;
        $Transakcija->komentar = 'Korisnik uplatio novac na racun';
        $Transakcija->user_id = $user->id;
        $Transakcija->save();
        $user->stanjeNaRacunu += $iznos;
        $user->save();
        return redirect('/Korisnik/NalogKorisnika');
    }
}
