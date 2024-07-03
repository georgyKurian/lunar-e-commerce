<?php

use App\Http\Controllers\Api\v1\ProductController;

Route::controller(ProductController::class)
    ->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/{product}', 'show');
    });
