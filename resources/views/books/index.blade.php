<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-5">Daftar Buku Booksales</h1>
        
        <table class="w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Judul</th>
                    <th class="px-4 py-2 border">Tahun Terbit</th>
                    <th class="px-4 py-2 border">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td class="px-4 py-2 border">{{ $book->title }}</td>
                    <td class="px-4 py-2 border text-center">{{ $book->publish_year }}</td>
                    <td class="px-4 py-2 border">{{ $book->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <a href="/genres" class="text-blue-500 hover:underline">← Lihat Daftar Genre</a>
        </div>
    </div>
</body>
</html>