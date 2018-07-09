<?php

namespace App\Http\Controllers;

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
        return view('Pocetne.Index');
    }
    public function ONama()
    {
        return view('Pocetne.ONama');
    }
}
