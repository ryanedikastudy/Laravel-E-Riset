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
        ]);

        for ($i = 0; $i < 5; $i++) {
            $user = \App\Models\User::factory()->create();
            \App\Models\Researcher::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        \App\Models\ResearchType::factory(5)->create();
        \App\Models\ResearchField::factory(5)->create();

        \App\Models\Research::factory(10)->create([
            "researcher_id" => \App\Models\Researcher::first()->id,
            "research_type_id" => \App\Models\ResearchType::first()->id,
            "research_field_id" => \App\Models\ResearchField::first()->id,
        ]);
    }
}
