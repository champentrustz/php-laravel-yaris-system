<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempAddress extends Model
{
    public function order()
    {
        return $this->hasOne('App\Order','id');
    }
}
