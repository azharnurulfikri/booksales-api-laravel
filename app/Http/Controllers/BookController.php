<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // 1. Panggil data dari Model 
        $books = Book::allData(); 

        // 2. Kirim data ke View
        return view('books.index', compact('books'));
    }
}