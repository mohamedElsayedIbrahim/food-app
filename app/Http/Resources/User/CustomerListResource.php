<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerListResource extends JsonResource
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
            'customer_address'=>$this->customer_address,
            'customer_phone'=>$this->customer_phone,
            'customer_prefrences'=>$this->customer_prefrences,
        ];
    }
}
