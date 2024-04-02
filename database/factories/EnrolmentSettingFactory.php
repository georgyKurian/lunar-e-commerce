<?php

namespace Database\Factories;

use App\Models\Store\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrolmentSettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => rand(1, 5),
            'product_variant_id' => ProductVariant::factory(),
            'location_1_id' => rand(1, 5),
            'location_2_id' => rand(1, 5),
        ];
    }
}
