<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    //
    protected $fillable = ['order_id','payment_method','total_amount'];

    function order() : HasOne {
        return $this->hasOne(order::class);
    }
}
