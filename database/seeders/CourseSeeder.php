<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DragonCode\Support\Facades\Helpers\Str;
use App\Models\Sede;
use App\Models\Grado;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/materias.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            $curso = new Course();
            $curso->grado = mb_strtolower($obj->grado);
            $curso->name = mb_strtolower($obj->name);
            $curso->slug = Str::slug($obj->name);
            $curso->grado_id = mb_strtolower($obj->id);
            $curso->save();
        }

        $sede = Sede::inRandomOrder()->first();
        $sede->coordinadores()->sync([3 => ['rol' => 'coordinator']]);
    }
}
