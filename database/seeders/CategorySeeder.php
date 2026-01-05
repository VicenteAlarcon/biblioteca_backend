<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Programación', 'Novela Histórica', 'Ciencia Ficción', 'Arte y Diseño', 'Ensayos', 'Biografías'];

        foreach($categories as $category)
        {
            Category::create(['name'=> $category, 'slug'=>Str::slug($category), 'description'=>'Libros relacionados con la categoría '.$category]);
        }
    }
}
