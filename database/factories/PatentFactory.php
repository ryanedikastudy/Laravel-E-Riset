<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patent>
 */
class PatentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->words(15, true),
            "published_at" => fake()->dateTimeBetween('-1 year', 'now'),
            "views" => rand(0, 100),
        ];
    }
}
