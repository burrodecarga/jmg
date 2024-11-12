<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Sede;
use App\Models\Lectivo;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$teachers = Role::whereName('teacher')->users->get();
        //$teachers = User::role('teacher')->get();
        $teachers = User::role('teacher')->get();
        //dd($teachers);
        foreach ($teachers as $t) {
            $newTeacher = Teacher::create([
                'name' => $t->name,
                'user_id' => $t->id,
                'cedula' => $t->id,
                'full_name' => $t->name,
                'email' => $t->email,
            ]);

            $sedes = Sede::inRandomOrder()->limit(2)->pluck('id');
            $newTeacher->sedes()->attach($sedes, ['rol' => 'teacher']);

            // $teacher = Teacher::create([
            //     'cedula' => $user->cedula,
            //     'full_name' => $user->name . ' ' . $user->last_name,
            //     'name' => $user->name,
            //     'last_name' => $user->last_name,
            //     'email' => $user->email,
            // ]);
            //$sede = Sede::inRandomOrder()->first();
            //$lectivo = Lectivo::inRandomOrder()->first();
            //$newTeacher->sedes()->attach([$sede->id => ['rol' => 'teacher']]);
            //$lectivo->teacher_id = $newTeacher->id;
            //$lectivo->save();
        }
    }
}
