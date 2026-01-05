<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Esto elige una categoría al azar de las que ya existen en nuestra BD
            'category_id' => Category::inRandomOrder()->first()->id,
            
            'title' => $this->faker->sentence(3), // Crea un título de 3 palabras
            'author' => $this->faker->name(),     // Inventa un nombre de autor
            'isbn' => $this->faker->unique()->isbn13(), // Genera un ISBN-13 válido y único
            'description' => $this->faker->paragraph(), // Un párrafo de sinopsis
            'stock' => $this->faker->numberBetween(0, 50), // Stock entre 0 y 20
            /*'published_at' => $this->faker->date(), // Una fecha aleatoria*/
        ];
    }
}
