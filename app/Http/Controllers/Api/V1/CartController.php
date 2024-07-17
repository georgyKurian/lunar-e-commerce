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
    public function index(Request $request, CartSessionInterface $cartSession)
    {
        $cart = $cartSession->current();
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
        }]);

        return new CartResource($cart);
    }

    public function destroy(Request $request, CartSessionInterface $cartSession)
    {
        $cartSession->forget();

        return response()->json([], 204); // 204 No Content
    }
}
