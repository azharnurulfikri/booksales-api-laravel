<?php

namespace App\Http\Controllers;

use App\Models\Book; // Import model Book-nya
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Ambil semua data buku dari database
        $books = Book::all();

        // Kirim data ke view 'books.index' (file index.blade.php di folder books)
        return view('books.index', compact('books'));
    }
}