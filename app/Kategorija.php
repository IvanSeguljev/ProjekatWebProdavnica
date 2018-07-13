<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    protected $table = 'kategorijas';
    public  $primaryKey = 'id';
    public $timestamps = true;
    
    public function Proizvodi()
    {
        return $this->hasMany('App\Proizvod');
    }
}
