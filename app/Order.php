<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function tempAddress()
    {
        return $this->belongsTo('App\TempAddress','temp_address_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
