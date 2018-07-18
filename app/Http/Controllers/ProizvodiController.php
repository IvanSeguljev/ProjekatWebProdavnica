<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proizvod;
class ProizvodiController extends Controller
{
public function Prikazi()
{
    
    return view('Proizvod.Prikazi')->with('proizvodi', Proizvod::paginate(9));
}
}
