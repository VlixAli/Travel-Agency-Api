<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_public' => $this->faker->boolean(),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(6),
            'number_of_days' => rand(3,9),
        ];
    }
}
