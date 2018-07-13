<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','stanjeNaRacunu'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Transakcije()
    {
        return $this->hasMany('App\Transakcija');
    }
    public function Korpe()
    {
        return $this->hasMany('App\Korpa');
    }
    public function Racuni()
    {
        return $this->hasMany('App\Racun');
    }
}