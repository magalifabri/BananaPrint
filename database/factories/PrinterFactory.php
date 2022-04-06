<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrinterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'color' => $this->faker->boolean(),
            'double_sided' => $this->faker->boolean(),
            'street' => $this->faker->streetName(),
            'street_number' => $this->faker->numberBetween(1, 100),
            'zipcode' => '0000',
            'lat' => $this->faker->randomFloat(3, 51, 52),
            'long' => $this->faker->randomFloat(3, 4, 5),
        ];
    }
}
