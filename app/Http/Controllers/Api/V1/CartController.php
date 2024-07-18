<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Store\ProductVariant;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Lunar\Base\CartSessionInterface;

class CartController extends Controller
{
    public function index(CartSessionInterface $cartSession)
    {
        $cart = $cartSession->current();

        if ($cart) {
            $cart->load(['lines.purchasable' => function (MorphTo $morphTo) {
                $morphTo
                    ->constrain([
                        ProductVariant::class => function ($query) {
                            $query->onlyBasicData();
                        },
                    ])
                    ->morphWith([
                        ProductVariant::class => ['product'],
                    ]);
            }])
            ->calculate();
        }

        return $cart ? new CartResource($cart) : response()->json(['data' => null]);
    }

    public function destroy(Request $request, CartSessionInterface $cartSession)
    {
        $cartSession->forget();

        return response()->json([], 204); // 204 No Content
    }
}
