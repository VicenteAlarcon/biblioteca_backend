
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Libros</h1>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>url</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name }}</td>
                 <td>{{ $book->category->slug }}</td>
                <td>{{ $book->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $books->links() }} 
</body>
</html>



