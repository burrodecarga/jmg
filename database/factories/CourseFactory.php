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
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO, Course::PUBLICADO, Course::PUBLICADO, Course::PUBLICADO, Course::PUBLICADO, Course::PUBLICADO, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            // 'price_id' => Price::all()->random()->id,
        ];
    }
}
