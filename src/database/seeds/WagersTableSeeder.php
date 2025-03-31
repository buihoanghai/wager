<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WagersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('wagers')->insert([
            [
                'total_wager_value' => 1000,
                'odds' => 2,
                'selling_percentage' => 50,
                'selling_price' => 500.00,
                'current_selling_price' => 450.00,
                'percentage_sold' => 20,
                'amount_sold' => 100.00,
                'placed_at' => now(),
            ],
            [
                'total_wager_value' => 2000,
                'odds' => 3,
                'selling_percentage' => 30,
                'selling_price' => 600.00,
                'current_selling_price' => 550.00,
                'percentage_sold' => 10,
                'amount_sold' => 60.00,
                'placed_at' => now(),
            ],
        ]);
    }
}
