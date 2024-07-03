<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->name,
            'file_name' => $this->file_name,
            'order_column' => $this->order_column,
            'original_url' => $this->original_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'responsive_images' => self::collection($this->whenLoaded('responsiveImages')),
        ];
    }
}
