<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Añadir Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div>
        <label>Título:</label>
        <input type="text" name="title" required>
    </div>

    <div>
        <label>Autor:</label>
        <input type="text" name="author" required>
    </div>

    <div>
        <label>Categoría:</label>
        <select name="category_id" required>
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>ISBN:</label>
        <input type="text" name="isbn" required>
    </div>

    <div>
        <label>Stock:</label>
        <input type="number" name="stock" value="0">
    </div>

    <div>
        <label>Descripción:</label>
        <textarea name="description"></textarea>
    </div>

    <button type="submit">Guardar Libro</button>
</form>
</body>
</html>