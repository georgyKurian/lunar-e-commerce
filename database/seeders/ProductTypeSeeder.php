<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Lunar\Models\AttributeGroup;
use Lunar\Models\Product;
use Lunar\Models\ProductType;

class ProductTypeSeeder extends AbstractSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = $this->getSeedData('product-types');

        $attributeGroups = AttributeGroup::where('attributable_type', Product::class)
            ->with(['attributes'])
            ->get();

        DB::transaction(function () use ($productTypes, $attributeGroups) {
            $productTypes
                ->each(function ($productTypeData) use ($attributeGroups) {
                    $productType = ProductType::create([
                        'id' => $productTypeData->id,
                        'name' => $productTypeData->name,
                    ]);

                    $attributeGroups
                        ->each(function ($attributeGroup) use ($productType) {
                            $productType->mappedAttributes()->attach($attributeGroup->attributes->pluck('id'));
                        });
                });
        });
    }
}
