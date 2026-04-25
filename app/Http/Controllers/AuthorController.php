<?php

namespace App\Http\Controllers;

// Memanggil Model Author untuk mengambil data
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Menampilkan daftar penulis.
     */
    public function index()
    
        
    {
    $authors = \App\Models\Author::all();
    return view('authors.index', compact('authors')); // Pastikan ada 's' setelah author
    }
    
}