<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Proizvod;
use App\Transakcija;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\ValidatePassword;

class KorisnikController extends Controller
{
    public function NalogKorisnika()
    {
        $user = User::Find(Auth::user()->id);
        $trans = $user->Transakcije;
        
        $data = ['user' => $user,'Transakcije' => $trans];
        
        return view('Korisnik.NalogKorisnika')->with('data',$data);
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
    public function PromeniSifru()
    {
        return view('Korisnik.PromeniSifru');
    }
    
    
   
    
    public function PromenaSifre(Request $data)
    {
         $validator = Validator::make($data->all(), [
            'stariPass' =>['required', new ValidatePassword(Auth::User())],
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        if ($validator->fails()) {
            return redirect('Korisnik/PromeniSifru')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $user = User::Find(Auth::User()->id);
            $user->password = Hash::make($data['password']);
            $user->save();
            return redirect('/Korisnik/NalogKorisnika');
        }
    }
    public function KorpaKorisnika(Request $req)
    {
        $korisnik = Auth::user();
        $korpa = $korisnik->korpe;
        $proizvodi = array();
        $ukupnaCena=0;
        if($korpa->count()>0)
        {
            foreach($korpa as $k)
            {
                
                $proizvod = $k->Proizvod;
                $proizvod->kolicina = $k->kolicina;
                $ukupnaCena+=$proizvod->cenaPoKomadu * $proizvod->kolicina;
                array_push($proizvodi, $proizvod);
            }
        }
        return view('Korisnik.Korpa')->with('proizvodi',$proizvodi)->with('ukupnaCena',$ukupnaCena);
    }
}
