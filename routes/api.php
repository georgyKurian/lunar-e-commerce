<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')
    ->name('v1.')
    ->group(function () {
        // Includes everything inside /api routes folder
        foreach (glob(__DIR__.'/api/*/*.php') as $filename) {
            include $filename;
        }
    });
