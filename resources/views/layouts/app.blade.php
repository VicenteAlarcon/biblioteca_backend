<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    <nav class="bg-white shadow-md mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <a href="{{ route('books.index') }}" class="text-xl font-bold text-blue-600">MiBiblioteca</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4">
        @yield('content')
    </main>
</body>
</html>