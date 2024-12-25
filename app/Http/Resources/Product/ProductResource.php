<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return[
            'product_code'=>$this->id,
            'product_name'=>$this->recipe_name,
            'product_ingredients'=>$this->ingredients,
            'product_nutrition_info'=>$this->nutritional_info,
            'price'=>(float)$this->price,
            'image'=>$this->image ? asset("$this->image"):null,
            'created_at'=>$this->created_at->format('d/m/Y')
        ];
    }
}
