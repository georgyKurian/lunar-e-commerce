<?php

namespace App\Models\Store;

use App\Models\EnrolmentSetting;
use Database\Factories\Store\ProductVariantFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Lunar\Database\Factories\ProductVariantFactory as FactoriesProductVariantFactory;
use Lunar\Models\ProductVariant as ModelsProductVariant;

class ProductVariant extends ModelsProductVariant
{
    protected static function newFactory(): FactoriesProductVariantFactory
    {
        return ProductVariantFactory::new();
    }

    public function enrolmentSetting(): HasOne
    {
        return $this->hasOne(EnrolmentSetting::class);
    }
}
