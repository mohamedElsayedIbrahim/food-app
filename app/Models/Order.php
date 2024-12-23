<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','payment_status','order_date'];

    function products() : BelongsToMany {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    function customer() : BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    function sale() : BelongsTo {
        return $this->belongsTo(Sale::class);
    }
}
