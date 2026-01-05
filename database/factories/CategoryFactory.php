<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(); // Ejemplo: 'Ficción'
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name), // Crea 'ficcion' desde 'Ficción'
            'description' => $this->faker->sentence(),
        ];
    }
}
