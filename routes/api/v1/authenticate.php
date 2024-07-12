<?php

use Illuminate\Support\Facades\Route;

Route::get('user', App\Http\Controllers\Api\V1\AuthenticateController::class)->middleware('auth:sanctum');
