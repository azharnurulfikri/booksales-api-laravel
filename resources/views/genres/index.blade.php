<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Genre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Kategori Buku</h1>
        
        <ul class="space-y-3">
            @foreach($genres as $g)
                <li class="bg-white p-4 shadow-sm rounded-lg border-l-4 border-green-500 hover:bg-green-50 transition">
                    <span class="font-semibold text-gray-700"># {{ $g['name'] }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-8">
            <a href="/books" class="text-blue-500 hover:underline">← Kembali ke Daftar Buku</a>
        </div>
    </div>
</body>
</html>