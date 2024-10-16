<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use App\Models\Sede;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Role::whereName('teacher')->first()->users;
        foreach ($teachers as $t) {
            $bdc = Teacher::create([
                'name' => $t->name,
                'user_id' => $t->id,
                'cedula' => $t->id,
                'full_name' => $t->name,
                'email' => $t->email,
            ]);

            $sedes = Sede::inRandomOrder()->limit(2)->pluck('id');
            $bdc->sedes()->attach($sedes, ['rol' => 'teacher']);
        }
    }
}
