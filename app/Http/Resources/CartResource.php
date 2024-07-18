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
            'fingerprints' => $this->fingerprint(),
            'calculated' => [
                'subTotal' => $this->subTotal, // The cart sub total, excluding tax
                'discountTotal' => $this->discountTotal, // The monetary value for the discount total.
                'shippingSubTotal' => $this->shippingSubTotal, // The shipping total, excluding tax.
                'taxTotal' => $this->taxTotal, // The monetary value for the amount of tax applied.
                'total' => $this->total, // The total price value for the cart
                // 'subTotalDiscounted' => $this->subTotalDiscounted, // The cart sub total, minus the discount amount.
                // 'taxBreakdown' => $this->taxBreakdown, // This is a collection of all taxes applied across all lines.
                // 'discountBreakdown' => $this->discountBreakdown, // This is a collection of how discounts were calculated
                // 'shippingTotal' => $this->shippingTotal, // The shipping total including tax.
                // 'shippingBreakdown' => $this->shippingBreakdown, // This is a collection of how shipping was calculated
            ],
        ];
    }
}
