<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stavkaRacuna extends Model
{
     protected $table = 'stavka_racunas';
    public  $primaryKey = 'id';
    public $timestamps = true;
    
    public function Racun()
    {
        return $this->belongsTo('App\Racun');
    }
    public function Proizvod()
    {
        return $this->belongsTo('App\Proizvod');
    }
}
