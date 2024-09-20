<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Sede;
use App\Models\Office;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Super Administrador',
            'rol' => 'super-administrador',
            'email' => 'super@gmail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now()
        ])->roles()->sync('1');


        $admin= User::create([
            'name' => 'Edwin Henriquez',
            'rol' => 'administrator',
            'email' => 'ed@gmail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now()
        ])->roles()->sync('2');

        //$admin->coordina()->sync(1);
        //    User::create([
        //     'name' => 'Doctor de prueba',
        //     'email'=>'doctor@gmail.com',
        //     'password'=>bcrypt('123'),
        //     'email_verified_at'=>now()
        //    ])->roles()->sync('3');

        //    User::create([
        //     'name' => 'Paciente de prueba',
        //     'email'=>'patient@gmail.com',
        //     'password'=>bcrypt('123'),
        //     'email_verified_at'=>now()
        //    ])->roles()->sync('4');

        //User::factory(10)->create();
        //    User::factory(100)->create()->each(function ($user){
        //        $user->assignRole('user');
        //    });



        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('parent');
            $user->rol = 'parent';
            $user->cedula = $user->id;
            $user->email = 'parent' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });

        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('student-basic');
            $user->cedula = $user->id;
            $user->rol = 'student-basic';
            $user->email = 'basic' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });

        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('student-middle');
            $user->rol = 'student-middle';
            $user->cedula = $user->id;
            $user->email = 'middle' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });


        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('student-high');
            $user->rol = 'student-high';
            $user->cedula = $user->id;
            $user->email = 'high' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });

        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('no role');
            $user->rol = 'no role';
            $user->cedula = $user->id;
            $user->email = 'norole' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });

        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('coordinator');
            $user->rol = 'coordinator';
            $user->cedula = $user->id;
            $user->email = 'coordinator' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });

        User::factory(20)->create()->each(function ($user, $count) {
            $user->assignRole('administrator');
            $user->rol = 'administrator';
            $user->cedula = $user->id;
            $user->email = 'administrator' . $count . '@gmail.com';
            $user->password = bcrypt('123');
            $user->save();
        });



        // User::factory(100)->create()->each(function ($user){
        //     $user->assignRole('patient');
        // });

    }
}
