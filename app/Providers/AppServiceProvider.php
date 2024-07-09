<?php

namespace App\Providers;

use App\Models\Store\ProductVariant as StoreProductVariant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Lunar\Admin\Support\Facades\LunarPanel;
use Lunar\Facades\ModelManifest;
use Lunar\Models\ProductVariant;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        LunarPanel::register();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Model::shouldBeStrict(! app()->isProduction());

        $this->bootLunar();
        $this->bootMorphMaps();
    }

    private function bootLunar(): void
    {
        $models = collect([
            ProductVariant::class => StoreProductVariant::class,
        ]);

        ModelManifest::register($models);
    }

    private function bootMorphMaps(): void
    {
        Relation::morphMap([
            'user' => User::class,
            // 'lunar_channel' => \Lunar\Models\Channel::class,
            // 'lunar_collection' => \Lunar\Models\Collection::class,
            // 'lunar_customer' => \Lunar\Models\Customer::class,
            // 'lunar_currency' => \Lunar\Models\Currency::class,
                'product_variant' => StoreProductVariant::class,
            // 'lunar_product' => \Lunar\Models\Product::class,
            // 'lunar_product_type' => \Lunar\Models\ProductType::class,
            // 'lunar_staff' => \Lunar\Admin\Models\Staff::class,
            // 'lunar_brand' => \Lunar\Models\Brand::class,
            // 'lunar_order' => \Lunar\Models\Order::class,
            // 'lunar_order_line' => \Lunar\Models\OrderLine::class,
            // 'lunar_order_address' => \Lunar\Models\OrderAddress::class,
        ]);
    }
}
