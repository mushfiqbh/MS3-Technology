<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'image' => 'activities/' . $this->faker->image('storage/app/public/activities', 640, 480, null, false),
        ];
    }
}
