<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    //
    protected $fillable = ['customer_id','payment_status','order_date'];

    function products() : BelongsToMany {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    function customer() : BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    function sale() : BelongsTo {
        return $this->belongsTo(Sale::class);
    }

}
