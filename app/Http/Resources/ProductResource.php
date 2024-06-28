<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'status' => $this->status,
            'product_type_id' => $this->product_type_id,
            'attribute_data' => $this->attribute_data,
            'brand' => BrandResource::collection($this->whenLoaded('brand')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'variants' => VariantResource::collection($this->whenLoaded('variants')),
        ];
    }
}
