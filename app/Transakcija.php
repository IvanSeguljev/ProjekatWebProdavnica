<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transakcija extends Model
{
    protected $table = 'transakcijas';
    public  $primaryKey = 'id';
    public $timestamps = true;
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
