<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DragonCode\Support\Facades\Helpers\Str;
use App\Models\Sede;
use App\Models\Section;
use App\Models\Requeriment;
use App\Models\Lesson;
use App\Models\Image;
use App\Models\Grado;
use App\Models\Goal;
use App\Models\Description;
use App\Models\Course;
use App\Models\Audience;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/materias.json');
        $description = "Las matemáticas se pueden definir como “la ciencia que estudia las relaciones entre cantidades, magnitudes y propiedades, y las operaciones lógicas mediante las cuales se pueden deducir cantidades, magnitudes y propiedades desconocidas”, en general las propiedades de los números y las relaciones que se establecen entre";

        $sede = Sede::inRandomOrder()->first();
        $sede->coordinadores()->sync([3 => ['rol' => 'coordinator']]);

        $data = json_decode($json);
        foreach ($data as $obj) {
            $grado = Grado::find($obj->id);
            $curso = new Course();
            $curso->grado = mb_strtolower($obj->grado);
            $curso->name = mb_strtolower($obj->name);
            $curso->slug = Str::slug($obj->name);
            $curso->grado_id = mb_strtolower($obj->id);
            $curso->ordinal = $grado->ordinal;
            $curso->level = $grado->level;
            $curso->description = $description;
            $curso->save();








            Requeriment::factory(4)->create([
                'course_id' => $curso->id
            ]);
            Goal::factory(4)->create([
                'course_id' => $curso->id
            ]);

            $sections = Section::factory(4)->create([
                'course_id' => $curso->id
            ]);

            Audience::factory(4)->create([
                'course_id' => $curso->id
            ]);

            foreach ($sections as $s) {
                $lessons = Lesson::factory(5)->create([
                    'section_id' => $s->id
                ]);
            }

            foreach ($lessons as $l) {
                Description::factory()->create([
                    'lesson_id' => $l->id
                ]);
            }




        }
    }
}
