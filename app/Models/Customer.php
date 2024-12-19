<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    //
    protected $fillable = ['user_id','customer_address','customer_phone','customer_prefrences'];

    function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    function orders() : HasMany {
        return $this->hasMany(Order::class);
    }
}
