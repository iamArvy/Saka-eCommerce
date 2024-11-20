<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['small', 'medium', 'large', 'extra large', 'extra extra large']),
            'code' => fake()->unique()->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
        ];
    }
}
