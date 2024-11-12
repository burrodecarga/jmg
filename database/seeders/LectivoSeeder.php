<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
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
        DB::disableQueryLog();
        $periodo = Periodo::find(1);
        $periodo->current = 1;
        $periodo->save();
        $sede = Sede::inRandomOrder()->first();
        $secciones = DB::table('grado_sede')->where('sede_id', $sede->id)->get();
        $courses = DB::table('courses')->get();

        // $courses = Course::all();
        foreach ($courses as $course) {
            $teacher = DB::table('teachers')->inRandomOrder()->first();
            //$teacher = Role::whereName('teacher')->first()->users;
            //dd($teacher->name);
            DB::table('course_lectivo')->insert([
                'course_id' => $course->id,
                'lectivo_id' => 1,
                'teacher' => $teacher->name,
                'user_id' => $teacher->user_id
            ]);

        }


        foreach ($secciones as $seccion) {
            //$grado = Grado::find($seccion->grado_id);
            $grado = DB::table('grados')->where('id', $seccion->grado_id)->first();

            //$courses = Course::where('grado_id', $grado->id)->first();
            $courses = DB::table('courses')->where('grado_id', $seccion->grado_id)->get();


            foreach ($courses as $course) {
                //$teacher = Teacher::inRandomOrder()->first();
                $teacher = DB::table('teachers')->inRandomOrder()->first();
                $data = [
                    'periodo_id' => $periodo->id,
                    'start' => Carbon::parse($periodo->start),
                    'end' => Carbon::parse($periodo->end),
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

