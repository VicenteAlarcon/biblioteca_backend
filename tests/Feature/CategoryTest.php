<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
   use RefreshDatabase;

  /** @test */
 public function a_category_can_be_created()
 {   
    //1. Preparamos entorno
     $categoryData =['name'=>'Terror', 'slug'=>'terror', 'description'=>'Colección de libros de terror'];
    //2. Creamos las inserciones
     $category = Category::create($categoryData);
     
    //Verificamos que los datos estén en la tabla

    $this->assertDatabaseHas('categories', $categoryData);
    $this->assertEquals('Terror', $category->name);
 }

 /** @test */

  public function a_category_can_be_soft_deleted()
  {
    $category = Category::create(['name'=>'Elimíname', 'slug'=>'eliminame', 'description'=>'Test de borrado']);

    $category->delete();

    //Verificamos que sigue en la BBDD pero con fecha de borrado(SoftDelete)

    $this->assertSoftDeleted($category);
  }
}
