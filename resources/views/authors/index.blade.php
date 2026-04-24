<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis | BookStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <div class="container mx-auto my-10 px-4">
        <div class="flex items-center justify-between mb-8 border-b-2 border-blue-500 pb-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">🖋️ Daftar Penulis</h1>
                <p class="text-gray-600 italic">Daftar sastrawan dan penulis dari berbagai penjuru dunia.</p>
            </div>
            <a href="/books" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Lihat Buku
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($authors as $author)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md hover:border-blue-300 transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">ID: {{ $author['id'] }}</span>
                            <span class="text-gray-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mt-4">{{ $author['name'] }}</h3>
                        <div class="flex items-center mt-2 text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"></path>
                            </svg>
                            <span class="text-sm">Asal Negara: <span class="font-medium">{{ $author['country'] }}</span></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <footer class="mt-12 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} BookSales API Project - Managed by Azhar
        </footer>
    </div>

</body>
</html>