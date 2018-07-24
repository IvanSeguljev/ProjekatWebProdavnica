<?php

namespace App\Http\Controllers;
use App\User;
use App\Racun;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        
        $this->middleware('auth',['except'=>['Pocetna','ONama']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Pocetna()
    {
        $brojkorisnika = User::all()->count();
        $r = Racun::all();
        $ukupnaz = 0;
        foreach ($r as $rac)
        {
            $ukupnaz += $rac->ukupanIznos;
        }
        
        return view('Pocetne.Index')->with('bk',$brojkorisnika)->with('ukzar',$ukupnaz);
    }
    public function ONama()
    {
        return view('Pocetne.ONama');
    }
}
