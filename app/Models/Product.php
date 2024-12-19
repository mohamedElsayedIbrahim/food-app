<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    //

    protected $fillable = ['recipe_name','ingredients','nutritional_info','price'];

    function orders() : BelongsToMany {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }
}
