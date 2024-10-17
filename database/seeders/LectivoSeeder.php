<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use App\Models\Sede;
use App\Models\Periodo;
use App\Models\Lectivo;
use App\Models\Grado;
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

        $sede = Sede::inRandomOrder()->first();
        $secciones = DB::table('grado_sede')->where('sede_id', $sede->id)->get();

        foreach ($secciones as $seccion) {
            $grado = Grado::find($seccion->grado_id);



            $courses = Course::where('grado_id', $grado->id)->get();

            foreach ($courses as $course) {
                $teacher = Teacher::inRandomOrder()->first();
                $data = [
                    'periodo_id' => $periodo->id,
                    'start' => $periodo->start,
                    'end' => $periodo->end,
                    'year' => $periodo->year,
                    'school_id' => $sede->school_id,
                    'sede_id' => $seccion->sede_id,
                    'grado_id' => $seccion->grado_id,
                    'course_id' => $course->id,
                    'course_name' => $course->name,
                    'ordinal' => $grado->ordinal,
                    'grado_name' => $grado->name,
                    'level' => $grado->level,
                    'numero' => $seccion->numero,
                    'letra' => $seccion->letra,
                    'teacher_name' => $teacher->name,
                    'teacher_id' => $teacher->user_id
                ];
                $lectivo = Lectivo::create($data);

            }

        }

    }
}

