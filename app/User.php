<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'user_image', 'contact_number','location' , 'latitude', 'longitude', 'device_type', 'device_token', 'facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];
    
    public static function checkEmail($email,$userId){
        return User::where('email','=',$email)->where('user_id','=',$userId)->first();
    }
    public static function findEmail($email){
        return User::where('email','=',$email)->first();
    }
}
