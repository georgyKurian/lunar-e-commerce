<?php

use App\Http\Controllers\Api\V1\PaymentIntentController;
use Illuminate\Support\Facades\Route;

Route::post('/payment/intent/create', PaymentIntentController::class)
    ->middleware('auth:sanctum')
    ->name('payment.intent.create');
