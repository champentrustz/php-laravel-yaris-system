<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
