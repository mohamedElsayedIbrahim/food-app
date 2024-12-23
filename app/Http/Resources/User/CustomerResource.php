<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'=>$this->email,
            'role'=>$this->role,
            'customer_address'=>$this->customer->customer_address,
            'customer_phone'=>$this->customer->phone,
            'customer_prefrences'=>$this->customer->customer_prefrences,
            'token'=>$this->createToken('FOODAPPIGSR')->accessToken
        ];
    }
}
