<?php

namespace App\Models\Store;

use Database\Factories\Store\ProductVariantFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Lunar\Database\Factories\ProductVariantFactory as LunarProductVariantFactory;
use Lunar\Models\ProductVariant as ModelsProductVariant;

class ProductVariant extends ModelsProductVariant
{
    protected static function newFactory(): LunarProductVariantFactory
    {
        return ProductVariantFactory::new();
    }

    public function enrolmentSetting(): HasOne
    {
        return $this->hasOne(EnrolmentSetting::class);
    }

    public function getMorphClass(): string
    {
        return 'product_variant';
    }

    public function scopeOnlyBasicData(Builder $query): Builder
    {
        return $query->select([
            'id',
            'product_id',
            'sku',
            'unit_quantity',
            'tax_class_id',
            'stock',
            'backorder',
            'shippable',
            'purchasable',
            'attribute_data',
            'created_at',
            'updated_at',
        ]);
    }
}
