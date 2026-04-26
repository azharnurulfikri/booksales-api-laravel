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

        return response()->json([
            "success" =>   true,
            "message" => "get all resources",
             "data" => $books
         ], 200);
}
}