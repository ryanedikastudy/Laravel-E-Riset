<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Researcher>
 */
class ResearcherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identifier' => fake()->nik(),
            'dob' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'religion' => fake()->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu']),
            'nationality' => fake()->randomElement(['indonesia', 'other']),
            'gender' => fake()->randomElement(['male', 'female']),
        ];
    }
}
