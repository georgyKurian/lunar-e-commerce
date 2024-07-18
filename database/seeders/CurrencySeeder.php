<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Lunar\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $defaultCurrency = Currency::getDefault();
            $defaultCurrency->default = false;
            $defaultCurrency->save();

            $newCurrency = Currency::make();

            $newCurrency->code = 'CAD';
            $newCurrency->name = 'CAD';
            $newCurrency->exchange_rate = 1.0;
            $newCurrency->decimal_places = 2;
            $newCurrency->enabled = true;
            $newCurrency->default = true;
            $newCurrency->save();
        });
    }
}
