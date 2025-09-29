<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->catchPhrase,
            'description' => $this->faker->paragraph,
        ];
    }
}
