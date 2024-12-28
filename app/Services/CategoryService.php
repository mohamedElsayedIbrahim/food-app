<?php

namespace App\Services;

use App\Models\Category;

class CategoryService{

    public static function getID(string $name) {
        $category = Category::where('category_title','=',$name)->first();
        return $category->id;
    }
}