<?php

namespace Database\Seeders;

use App\Models\Sede;
use App\Models\User;
use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/sedes.json');
        $data = json_decode($json);
        $grados = Grado::pluck('id');
        foreach ($data as $obj) {
            $user = User::where('email', 'like', '%admin%')->inRandomOrder()->limit(1)->get()->first();
            //dd($user);
            $sede = new Sede();
            $sede->name = mb_strtolower($obj->name);
            $sede->school = mb_strtolower($obj->name);
            $sede->slug = Str::slug($obj->name);
            $sede->nit = mb_strtolower($obj->nit);
            $sede->dane = mb_strtolower($obj->dane);
            $sede->address = mb_strtolower($obj->address);
            $sede->department = mb_strtolower($obj->department);
            $sede->municipality = mb_strtolower($obj->municipality);
            $sede->phone = mb_strtolower($obj->phone);
            $sede->cell = mb_strtolower($obj->cell);
            $sede->email = mb_strtolower($obj->email);
            $sede->school_id = mb_strtolower($obj->school_id);
            $sede->save();
            $sede->coordinadores()->sync([$user->id => ['rol' => 'coordinator']]);
            $sede->grados()->sync($grados);
        }
    }
}
