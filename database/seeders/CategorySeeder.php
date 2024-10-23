<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DragonCode\Support\Facades\Helpers\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Desarrollo Social', 'slug' => Str::slug('Desarrollo Social')]);
        Category::create(['name' => 'Desarrollo Estudiantil', 'slug' => Str::slug('Desarrollo Estudiantil')]);
        Category::create(['name' => 'Desarrollo Pedagógico', 'slug' => Str::slug('Desarrollo Pedagógico')]);
        Category::create(['name' => 'Programación', 'slug' => Str::slug('Programación')]);
    }
}
