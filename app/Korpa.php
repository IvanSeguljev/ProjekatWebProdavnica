<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korpa extends Model
{
    protected $table = 'kategorijas';
    public $timestamps = true;
    
     public function User()
    {
        return $this->belongsTo('App\User');
    }
     public function Proizvod()
    {
        return $this->belongsTo('App\Proizvod');
    }
    
}
