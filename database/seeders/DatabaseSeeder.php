<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // my table definitions go here

        User::flushEventListeners();


        $this->call(PeriodoSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermisionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(SedeSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(CourseSeeder::class);
        // $this->call(UtilSeeder::class);
        // $this->call(UtilCourseSeeder::class);
        // $this->call(PlatFormSeeder::class);
        // $this->call(LevelSeeder::class);
        // $this->call(TeacherSeeder::class);
        // $this->call(LectivoSeeder::class);
        // $this->call(ReviewSeeder::class);




        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

