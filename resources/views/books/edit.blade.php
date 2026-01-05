<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ old('title', $book->title) }}" required>
     <input type="text" name="author" value="{{ old('author', $book->author) }}" required>
      <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" required>
       <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
    
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Actualizar Libro</button>
    @if ($errors->any())
    <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; margin-bottom: 1rem;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>
</body>
</html>