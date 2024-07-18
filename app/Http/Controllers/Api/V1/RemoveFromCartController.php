<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Store\ProductVariant;
use Domain\Cart\Actions\CreateCartAction;
use Domain\Cart\Actions\RemoveFromCartAction;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Lunar\Base\CartSessionInterface;
use Lunar\Models\CartLine;

class RemoveFromCartController extends Controller
{
    public function __invoke(Request $request, CartSessionInterface $cartSession, CreateCartAction $createCartAction, RemoveFromCartAction $removeFromCartAction)
    {
        $validated = $request->validate([
           'cart_line_id' => ['required', 'integer', Rule::exists((new CartLine())->getTable(), 'id')],
        ]);

        $cart = $cartSession->current();

        if ($cart) {
            $cart = $removeFromCartAction->execute($cart, $validated['cart_line_id']);
        }

        $cart
            ->load(['lines.purchasable' => function (MorphTo $morphTo) {
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

        return new CartResource($cart);
    }
}
