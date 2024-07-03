<?php

namespace App\Models\Store;

use App\Traits\HasAttributeData;
use Database\Factories\Store\ProductVariantFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Lunar\Database\Factories\ProductVariantFactory as LunarProductVariantFactory;
use Lunar\Models\ProductVariant as ModelsProductVariant;

class ProductVariant extends ModelsProductVariant
{
    use HasAttributeData;

    protected static function newFactory(): LunarProductVariantFactory
    {
        return ProductVariantFactory::new();
    }

    public function enrolmentSetting(): HasOne
    {
        return $this->hasOne(ProductEnrolmentSetting::class);
    }

    public function getMorphClass(): string
    {
        return 'product_variant';
    }
}
