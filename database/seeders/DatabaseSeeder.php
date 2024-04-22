<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Dr. Rita Erlinda, M.Pd',
            'email' => 'ritaerlinda@example.com',
            'password' => bcrypt('Password11!')
        ]);

        \App\Models\Researcher::factory()->create([
            'user_id' => $user->id,
            'status' => 'verified',
        ]);

        for ($i = 0; $i < 4; $i++) {
            $user = \App\Models\User::factory()->create();
            $status = fake()->randomElement(['verified', 'unverified']);

            \App\Models\Researcher::factory()->create([
                'user_id' => $user->id,
                'status' => $status,
            ]);
        }

        \App\Models\ResearchType::factory(5)->create();
        \App\Models\ResearchField::factory(5)->create();

        for ($i = 0; $i < 40; $i++) {
            $researcher = \App\Models\Researcher::inRandomOrder()->first();
            $field = \App\Models\ResearchField::inRandomOrder()->first();
            $type = \App\Models\ResearchType::inRandomOrder()->first();

            $status = fake()->randomElement(['verified', 'unverified']);

            $research = \App\Models\Research::factory()->create([
                'researcher_id' => $researcher->id,
                'research_type_id' => $type->id,
                'research_field_id' => $field->id,
                'status' => $status,
            ]);

            \App\Models\Publication::factory(fake()->numberBetween(0, 4))->create([
                'research_id' => $research->id,
            ]);

            \App\Models\Patent::factory(fake()->numberBetween(0, 4))->create([
                'research_id' => $research->id,
            ]);
        }
    }
}
