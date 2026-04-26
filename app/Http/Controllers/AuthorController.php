<?php

namespace App\Http\Controllers;

use App\Models\Author; // Pastikan Model Author sudah di-import
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        // Ambil semua data penulis dari database
        $authors = Author::all();

        return response()->json([
            "success" => true,
            "message" => "Get all authors successfully",
            "data"    => $authors
        ], 200);
    }
}