<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'travel_id' => Travel::all()->random()->id,
            'name' => $this->faker->name,
            'starting_date' => $this->faker->dateTime,
            'ending_date' => $this->faker->dateTime,
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
