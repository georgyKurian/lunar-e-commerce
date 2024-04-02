<?php

namespace App\Providers;

use App\Models\Store\ProductVariant as StoreProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Lunar\Facades\ModelManifest;
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
    }

    private function bootLunar(): void
    {
        $models = collect([
            ProductVariant::class => StoreProductVariant::class,
        ]);

        ModelManifest::register($models);
    }
}
