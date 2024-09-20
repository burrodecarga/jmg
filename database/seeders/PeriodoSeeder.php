<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $date = Carbon::now();
        $start = $date->copy()->startOfYear();
        $end   = $date->copy()->endOfYear();
        $year = 2024;

        for ($i = 1; $i <= 20; $i++) {
            Periodo::create(['start' => $start, 'end' => $end, 'year' => $year]);
            $start = $start->addYear();
            $end = $end->addYear();
            $year = $year + 1;
        } //
    }
}
