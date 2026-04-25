<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Genre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-2xl mx-auto">
        <h1>Daftar Genre</h1>
        <ul>
            @foreach ($genres as $genre)
                <li>{{ $genre->name }} - {{ $genre->description }}</li>
            @endforeach
        </ul>

            <div class="mt-8">
                <a href="/books" class="text-blue-500 hover:underline">← Kembali ke Daftar Buku</a>
            </div>
    </div>
</body>
</html>