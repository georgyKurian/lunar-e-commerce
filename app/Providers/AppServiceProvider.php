<?php

namespace App\Providers;

use App\Models\Store\ProductVariant as StoreProductVariant;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Lunar\Facades\ModelManifest;
use Lunar\Models\Product;
use Lunar\Models\ProductVariant;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(! app()->isProduction());
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
        Relation::enforceMorphMap([
            'user' => User::class,
            'customer' => \Lunar\Models\Customer::class,
            'product_variant' => StoreProductVariant::class,
            'product' => Product::class,
            'lunar_collection' => \Lunar\Models\Collection::class,
            'brand' => \Lunar\Models\Brand::class,
            'order' => \Lunar\Models\Order::class,
            'order_line' => \Lunar\Models\OrderLine::class,
            'order_address' => \Lunar\Models\OrderAddress::class,
        ]);
    }
}
