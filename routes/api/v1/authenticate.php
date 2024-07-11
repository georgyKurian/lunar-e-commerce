<?php

use App\Http\Controllers\Api\v1\AuthenticateController;
use Illuminate\Support\Facades\Route;

Route::get('user', AuthenticateController::class)->middleware('auth:sanctum');
