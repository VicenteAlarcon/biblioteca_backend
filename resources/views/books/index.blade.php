
@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-extrabold text-gray-800">Libros Disponibles</h1>
    <a href="{{ route('books.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        + Añadir Libro
    </a>
</div>
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Catálogo de Libros</h1>
    
    <div class="flex items-center space-x-4">
        <form action="{{ route('books.index') }}" method="GET" class="relative">
            <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Buscar por título o autor..." 
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 outline-none w-64 transition-all focus:w-80">
            <div class="absolute left-3 top-2.5 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </form>

        <a href="{{ route('books.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition duration-200">
            + Nuevo
        </a>
    </div>
</div>
<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-semibold">
                <th class="px-5 py-3">Título</th>
                <th class="px-5 py-3">Autor</th>
                <th class="px-5 py-3">Categoría</th>
                <th class="px-5 py-3">Stock</th>
                <th class="px-5 py-3 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($books as $book)
            <tr>
                <td class="px-5 py-5 text-sm">
                    <p class="text-gray-900 font-medium">{{ $book->title }}</p>
                    <p class="text-gray-500 text-xs">{{ $book->isbn }}</p>
                </td>
                <td class="px-5 py-5 text-sm">{{ $book->author }}</td>
                <td class="px-5 py-5 text-sm">
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                        {{ $book->category->name }}
                    </span>
                </td>
                <td class="px-5 py-5 text-sm font-bold {{ $book->stock < 5 ? 'text-red-500' : 'text-green-600' }}">
                    {{ $book->stock }}
                </td>
                <td class="px-5 py-5 text-sm text-center flex justify-center space-x-3">
                    <a href="{{ route('books.edit', $book) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('¿Seguro?');">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:text-red-900">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



