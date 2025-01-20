<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file' => fake()->word(),
            'cover' => fake()->word(),
            'title' => fake()->word(),
            'type' => fake()->word(),
            'classification_number' => fake()->word(),
            'author' => fake()->name(),
        ];
    }
}
