<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Section;
use App\Models\Requeriment;
use App\Models\Lesson;
use App\Models\Image;
use App\Models\Goal;
use App\Models\Description;
use App\Models\Course;
use App\Models\Audience;

class UtilCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        //$courses = Course::inRandomOrder()->first();
        //         foreach ($courses as $c) {
//             /*  Image::factory(1)->create([
//                  'imageable_id' => $c->id,
//                  'imageable_type' => 'App\Models\Course'
//              ]);
//              Requeriment::factory(4)->create([
//                  'course_id' => $c->id
//              ]);
//              Goal::factory(4)->create([
//                  'course_id' => $c->id
//              ]);
//   */
//             // $sections = Section::factory(4)->create([
//             //     'course_id' => $c->id
//             // ]);

        //             // Audience::factory(4)->create([
//             //     'course_id' => $c->id
//             // ]);

        //             // foreach ($sections as $s) {
//             //     $lessons = Lesson::factory(5)->create([
//             //         'section_id' => $s->id
//             //     ]);
//             // }

        //             // foreach ($lessons as $l) {
//             //     Description::factory()->create([
//             //         'lesson_id' => $l->id
//             //     ]);
//             // }




        //         }
    }
}
