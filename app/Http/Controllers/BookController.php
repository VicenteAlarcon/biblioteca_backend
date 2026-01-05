<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(Request $request): View
    {
       $query = Book::query();

    // Si el usuario escribió algo en el buscador
    if ($request->has('search')) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
    }

    $books = $query->with('category')->get();
    
    return view('books.index', compact('books'));
    }

    public function create()
    {
      $categories = Category::orderBy('name')->get();
      return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
         Book::create($request->validated());

         return redirect()->route('books.index')
         ->with('success', '¡Libro creado correctamente');
    }

    public function edit(Book $book): View
{
    $categories = Category::orderBy('name')->get();
    return view('books.edit', compact('book', 'categories'));
}

public function update(UpdateBookRequest $request, Book $book): RedirectResponse
{
    // Actualizamos con los datos ya validados por el FormRequest
    $book->update($request->validated());

    return redirect()->route('books.index')
        ->with('success', 'Libro actualizado con éxito.');
}

public function destroy(Book $book): RedirectResponse
{
    $book->delete();

    return redirect()->route('books.index')
    ->with('success', 'Libro eliminado correctamente.');
}
}
