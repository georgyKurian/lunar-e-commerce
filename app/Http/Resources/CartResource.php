<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'currency_id' => $this->currency_id,
            'order_id' => $this->order_id,
            'coupon_code' => $this->coupon_code,
            'shipping_address' => $this->shipping_address,
            'billing_address' => $this->billing_address,
            'customer' => new CustomerResource($this->customer),
            'lines' => CartLineResource::collection($this->whenLoaded('lines')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
