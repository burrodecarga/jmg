<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create(['name' => 'mañana']);
        Schedule::create(['name' => 'tarde']);
        Schedule::create(['name' => 'noche']);
        Schedule::create(['name' => 'sabatino']);
        Schedule::create(['name' => 'único']);
    }
}
