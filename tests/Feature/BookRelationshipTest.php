<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Category;


class BookRelationshipTest extends TestCase
{
   use RefreshDatabase;

   /** @test */

   public function a_book_belongs_to_a_category()
   {
    // 1.Creamos una categoria
    $category = Category::factory()->create(['name' => 'Ficción']);

    // 2.Creamos un libro asociado a esa categoría
    $book = Book::factory()->create(['category_id' => $category->id, 'title'=>'El Quijote']);

    // 3.Verificamos que el libro tiene la categoría correcta
    
    $this->assertEquals('Ficción', $book->category->name);
    $this->assertInstanceOf(Category::class, $book->category);
}

  /** @test */
   public function books_are_deleted_when_category_is_deleted_physically()
   {
    // 1. Preparamos: Categoría con 3 libros
    $category = Category::factory()->create();
    Book::factory()->count(3)->create(['category_id'=>$category->id]);

    // 2. Acción: Borrado físico (forceDelete) para probar el ON DELETE CASCADE de la DB
        $category->forceDelete();

        // 3. Verificación: No deben quedar libros en la tabla 'books'
        $this->assertDatabaseCount('books', 0);

   }


}
