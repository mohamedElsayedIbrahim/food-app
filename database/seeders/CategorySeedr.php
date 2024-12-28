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

        $category = ["Keto Food",
        "Vegan",
        "Atkins",
        "Smoothie",
        "Healthy sweets"
        ];

        foreach ($category as $value) {
            # code...
            Category::create([
                'category_title'=>$value
            ]);
        }
    }
}
