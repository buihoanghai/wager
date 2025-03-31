<?php
namespace Database\Factories;
use App\Wager;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class WagerFactory extends Factory
{
    protected $model = Wager::class;

    public function definition()
    {
        return [
            'total_wager_value' => $this->faker->randomNumber(2),
            'odds' => $this->faker->randomFloat(2, 1, 100),
            'selling_percentage' => $this->faker->numberBetween(1, 100),
            'selling_price' => $this->faker->randomFloat(2, 10, 100),
            'current_selling_price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
