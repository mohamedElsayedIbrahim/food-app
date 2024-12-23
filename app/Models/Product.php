<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_name','ingredients','nutritional_info','price','category_id'];

    function orders() : BelongsToMany {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }
}
