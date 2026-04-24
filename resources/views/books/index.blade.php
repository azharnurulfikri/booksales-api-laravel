<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Book Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-blue-600 p-4 text-white shadow-lg">
        <div class="container mx-auto font-bold text-xl">📚 BookStore</div>
    </nav>

    <header class="bg-white py-16 px-4 text-center">
        <h1 class="text-4xl font-extrabold mb-4">Selamat Datang di Koleksi Buku Saya</h1>
        <p class="text-gray-600 text-lg">Temukan referensi bacaan favorit kamu di sini.</p>
    </header>

    <main class="container mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6">Daftar Buku Terbaru</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($books as $book)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow border-t-4 border-blue-500">
                <span class="text-xs font-bold uppercase text-blue-500">{{ $book['category'] }}</span>
                <h3 class="text-xl font-bold mt-2">{{ $book['title'] }}</h3>
                <p class="text-gray-500 mt-1">Penulis: {{ $book['author'] }}</p>
                <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                    Lihat Detail
                </button>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="text-center py-10 text-gray-500">
        &copy; {{ date('Y') }} My Book Library - Laravel Project
    </footer>

</body>
</html>