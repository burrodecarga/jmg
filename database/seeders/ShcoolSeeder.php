<?php

namespace Database\Seeders;

use App\Models\School;
use DragonCode\Support\Facades\Filesystem\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DragonCode\Support\Facades\Helpers\Str;

class ShcoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/schools.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            $school = new School();
            $school->name = mb_strtolower($obj->name);
            $school->slug = Str::slug($obj->name);
            $school->nit = mb_strtolower($obj->nit);
            $school->dane = mb_strtolower($obj->dane);
            $school->save();
        }
    }
}
