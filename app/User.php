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
        'code','title_name','first_name', 'last_name', 'nick_name','password',  'email',   'role', 'gender', 'birthday', 'telephone', 'facebook',
        'line_id_type', 'line_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userAddress()
    {
        return $this->hasOne('App\UserAddress','user_id');
    }

    public function userCar()
    {
        return $this->hasOne('App\UserCar','user_id');
    }

    public function order()
    {
        return $this->hasMany('App\Order','id');
    }

    public function eventCheck()
    {
        return $this->hasMany('App\EventCheck','id');
    }


}
