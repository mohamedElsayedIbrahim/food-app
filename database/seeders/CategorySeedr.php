<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $category = ['Beverages', 'Snacks', 'Seasonal Specials', 'Meal Kits', 'Sugar-Free', 'Dairy-Free', 'High-Protein', 'Low-Carb', 'Paleo', 'Organic', 'Gluten-Free'];

        foreach ($category as $value) {
            # code...
            Category::create([
                'category_title'=>$value
            ]);
        }
    }
}
