<?php

use App\Http\Controllers\Api\V1\AddToCartController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\RemoveFromCartController;
use Illuminate\Support\Facades\Route;

Route::controller(CartController::class)
    ->group(function () {
        Route::get('/cart', 'index');
        Route::delete('/cart', 'destroy');
    });

Route::post('/cart/add', AddToCartController::class)
    ->name('cart.add');
Route::post('/cart/remove', RemoveFromCartController::class)
    ->name('cart.remove');
