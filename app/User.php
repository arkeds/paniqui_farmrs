<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'password', 'firstname', 'middlename', 'lastname', 'is_active', 
        'designation', 'contact', 'address', 'birthdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'is_admin', 'root', 'remember_token'
    ];

    public function getName(){
        return $this->firstname." ".$this->lastname;
    }

    public function status(){
        if($this->is_active){
            return "Active";
        }else {
            return "Disabled";
        }
    }
}
