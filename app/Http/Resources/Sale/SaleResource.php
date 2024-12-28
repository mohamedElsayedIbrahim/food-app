<?php

namespace App\Http\Resources\Sale;

use App\Http\Resources\Order\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
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
            'payment_method'=>$this->payment_method,
            'amount'=>$this->total_amount,
            'order_info'=>new OrderResource($this->order)
        ];
    }
}
