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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Researcher::factory()->create([
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => bcrypt('Password11!')
            ])->id,
            'dob' => '1990-01-01',
            'phone' => '0812345678',
            'address' => 'Jl. Jendral Sudirman No.1',
            'religion' => 'islam',
            'nationality' => 'Indonesia',
            'gender' => 'male',
        ]);

        \App\Models\Researcher::factory(5)->create([
            'user_id' => \App\Models\User::factory()->create(),
            'dob' => '1990-01-01',
            'phone' => '0812345678',
            'address' => 'Jl. Jendral Sudirman No.1',
            'religion' => 'islam',
            'nationality' => 'Indonesia',
            'gender' => 'male',
        ]);

        \App\Models\ResearchType::factory(5)->create();
        \App\Models\ResearchField::factory(5)->create();

        \App\Models\Research::factory(12)->create([
            "research_type_id" => \App\Models\ResearchType::first()->id,
            "research_field_id" => \App\Models\ResearchField::first()->id,
            "researcher_id" => \App\Models\Researcher::first()->id,
        ]);
    }
}
