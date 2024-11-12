<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->paragraph(),
            'user_id' => User::all()->random()->id,
            'course_id' => Course::all()->random()->id,
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9])
        ];
    }
}
