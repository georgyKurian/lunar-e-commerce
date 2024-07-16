<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lunar\Base\CartSessionInterface;
use Lunar\Models\Cart;

class CartController extends Controller
{
    public function index(Request $request, CartSessionInterface $cartSession, Cart $cart)
    {
        // TODO:

        return $cart;
    }

    public function destroy(Request $request, CartSessionInterface $cartSession)
    {
        $cartSession->forget();

        return response()->json([], 204); // 204 No Content
    }
}
