<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proizvod;
use Illuminate\Support\Facades\Input;
use App\Kategorija;
class ProizvodiController extends Controller
{
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
    return view('Proizvod.Prikazi')->with('proizvodi', $proizvodi)->with('kategorije', Kategorija::all());
}
}
