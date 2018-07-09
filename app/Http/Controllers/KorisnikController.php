<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
}
