<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Store\ProductVariant;
use Domain\Cart\Actions\AddToCartAction;
use Domain\Cart\Actions\CreateCartAction;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Lunar\Base\CartSessionInterface;
use Lunar\Models\Product;

class AddToCartController extends Controller
{
    public function __invoke(Request $request, CartSessionInterface $cartSession, CreateCartAction $createCartAction, AddToCartAction $addToCartAction)
    {
        $validated = $request->validate([
           'product_variant' => ['required', 'array'],
              'product_variant.id' => ['required', 'integer', Rule::exists((new Product())->getTable(), 'id')],
           'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = ProductVariant::findOrFail($validated['product_variant']['id']);
        $cart = $cartSession->current();

        if (! $cart) {
            $cart = $createCartAction->execute();
            $cartSession->use($cart);
        }

        $updatedCart = $addToCartAction->execute($cart, $product, $validated['quantity']);

        $updatedCart
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

        return new CartResource($updatedCart);
    }
}
