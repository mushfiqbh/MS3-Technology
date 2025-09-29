<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'activity_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
