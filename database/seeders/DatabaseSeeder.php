<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create();

        // seed experts table
        for ($i = 1; $i <= 5; $i++) {
            DB::table('experts')->insert([
                'name' => $faker->name,
                'position' => $faker->jobTitle,
                'image' => 'https://via.placeholder.com/150',
                'department' => $faker->randomElement(['IT', 'HR', 'Finance', 'Marketing']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
