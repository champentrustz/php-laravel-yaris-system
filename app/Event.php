<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function eventQueue()
    {
        return $this->hasOne('App\EventQueue','event_id');
    }

    public function eventCheck()
    {
        return $this->hasMany('App\EventCheck','id');
    }
}
