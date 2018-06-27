<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventQueue extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event','id');
    }
}
