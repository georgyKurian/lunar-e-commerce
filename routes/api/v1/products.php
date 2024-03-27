<?php

use App\Http\Controllers\Api\v1\ProductController;

Route::resource('products', ProductController::class)->except([
    'store', 'update', 'destroy',
]);
