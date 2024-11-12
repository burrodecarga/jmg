<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DragonCode\Support\Facades\Helpers\Str;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [];
    }
}
