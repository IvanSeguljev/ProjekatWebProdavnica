<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
     protected $table = 'proizvods';
    public  $primaryKey = 'id';
    public $timestamps = true;
    
     public function Kategorija()
    {
        return $this->belongsTo('App\Kategorija');
    }
    public function Korpe()
    {
        return $this->hasMany('App\Korpa');
    }
    
}
