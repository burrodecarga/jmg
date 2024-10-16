<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use App\Models\Periodo;
use App\Models\Course;

class LectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periodo = Periodo::find(1);
        $periodo->current = 1;
        $periodo->save();
        $courses = Course::all();
        foreach ($courses as $course) {
            $teacher = Teacher::inRandomOrder()->first();
            DB::table('course_lectivo')->insert([
                'course_id' => $course->id,
                'lectivo_id' => 1,
                'teacher' => $teacher->name,
                'user_id' => $teacher->user_id

            ]);

        }
    }
}

