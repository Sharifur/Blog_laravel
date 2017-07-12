<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use App\Notifications\Friendsable;
class User extends Authenticatable
{
    use Notifiable;
   // use Friendsable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setNameAttribute($value){
        $this->attributes['name']= ucfirst($value);
    }
    
    public function setPasswordAttribute($value){
        return $this->attributes['password']=bcrypt($value);
    }
    
}
