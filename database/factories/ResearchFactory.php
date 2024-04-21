<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Research>
 */
class ResearchFactory extends Factory
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
            "abstract" => fake()->paragraphs(3, true),
            "location" => fake()->city(),
            "published_at" => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
