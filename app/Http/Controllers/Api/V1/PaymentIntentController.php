<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Domain\Cart\Actions\AddToCartAction;
use Domain\Cart\Actions\CreateCartAction;
use Illuminate\Http\Request;
use Lunar\Base\CartSessionInterface;
use Lunar\Stripe\Facades\Stripe;

class PaymentIntentController extends Controller
{
    public function __invoke(Request $request, CartSessionInterface $cartSession, CreateCartAction $createCartAction, AddToCartAction $addToCartAction)
    {
        $cart = $cartSession->current();

        $intent = Stripe::createIntent($cart, opts:[]);

        if ($intent->amount != $cart->total->value) {
            Stripe::syncIntent($cart);
        }

        return $intent;
    }
}
