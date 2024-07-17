<?php

namespace Domain\Cart\Actions;

use Lunar\Base\Purchasable;
use Lunar\Models\Cart;
use Lunar\Models\CartLine;

class AddToCartAction
{
    public function execute(Cart $cart, Purchasable $purchasable, int $quantity): Cart
    {
        $cartLine = $this->getCartLine($cart, $purchasable);
        if (! $cartLine) {
            $cartLine = $this->createNewCartLine($cart, $purchasable);
            $cartLine->quantity = $quantity;
        } else {
            $cartLine->quantity += $quantity;
        }
        $cartLine->save();

        return $cart;
    }

    private function getCartLine(Cart $cart, Purchasable $purchasable): ?CartLine
    {
        return $cart->lines->first(fn (CartLine $cartLine) => $cartLine->purchasable_id === $purchasable->id);
    }

    private function createNewCartLine(Cart $cart, Purchasable $purchasable): CartLine
    {
        $cartLine = $cart
            ->lines()
            ->make();
        $cartLine->purchasable()->associate($purchasable);

        return $cartLine;
    }
}
