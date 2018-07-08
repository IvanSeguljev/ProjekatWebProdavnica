<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Pocetna()
    {
        return view("Pocetne.Index");
    }
    public function ONama()
    {
        return view("Pocetne.ONama");
    }
}
