<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $pricing = $this->pricing()->get();

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            $this->mergeWhen($this->hasAttribute('length_value'), [
                // 'tax_ref' => $this->tax_ref,
                // 'gtin' => $this->gtin,
                // 'mpn' => $this->mpn,
                // 'ean' => $this->ean,
                'length_value' => $this->length_value,
                // 'length_unit' => $this->length_unit,
                // 'width_value' => $this->width_value,
                // 'width_unit' => $this->width_unit,
                // 'height_value' => $this->height_value,
                // 'height_unit' => $this->height_unit,
                // 'weight_value' => $this->weight_value,
                // 'weight_unit' => $this->weight_unit,
                // 'volume_value' => $this->volume_value,
                // 'volume_unit' => $this->volume_unit,
            ]),
            'sku' => $this->sku,
            'shippable' => $this->shippable,
            'stock' => $this->stock,
            'backorder' => $this->backorder,
            'purchasable' => $this->purchasable,
            'attribute_data' => $this->attribute_data,
            'price'   => [
                'base' => new PriceResource($pricing->base),
                'matched' => new PriceResource($pricing->matched),
            ],
            'product' => new ProductResource($this->whenLoaded('product')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
