<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proizvod;
class ProizvodiController extends Controller
{
public function Prikazi()
{
    $proizvodi = Proizvod::all();
    return view('Proizvod.Prikazi')->with('proizvodi',$proizvodi);
}
}
