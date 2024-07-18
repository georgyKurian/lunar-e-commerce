<?php

namespace Domain\Cart\Actions;

use Lunar\Models\Cart;

class RemoveFromCartAction
{
    public function execute(Cart $cart, int $cartLineId): Cart
    {
        $cartLine = $cart->lines->find($cartLineId);
        if ($cartLine) {
            $cart->remove($cartLine->id);
        }

        return $cart;
    }
}
