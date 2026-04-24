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
        // Mengambil data array dummy dari static method di Model Author
        $authors = Author::allData();

        // Mengirim data ke view 'authors.index'
        return view('authors.index', compact('authors'));
    }
}