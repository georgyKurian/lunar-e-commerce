<?php

namespace Domain\Cart\Actions;

class CreateCartAction
{
    public function execute()
    {
        $currency = \Lunar\Models\Currency::getDefault();
        $channel = \Lunar\Models\Channel::getDefault();
        $cart = \Lunar\Models\Cart::create([
            'currency_id' => $currency->id,
            'channel_id' => $channel->id,
        ]);

        return $cart;
    }
}
