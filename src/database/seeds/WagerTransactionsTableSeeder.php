<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WagerTransactionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('wager_transactions')->insert([
            [
                'wager_id' => 1,
                'buying_price' => 250.00,
                'bought_at' => now(),
            ],
            [
                'wager_id' => 2,
                'buying_price' => 300.00,
                'bought_at' => now(),
            ],
        ]);
    }
}
