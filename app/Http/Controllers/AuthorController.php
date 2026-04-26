<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // READ ALL DATA
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            "success" => true,
            "message" => "Get all authors",
            "data" => $authors
        ], 200);
    }

    // CREATE DATA
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }

        $author = Author::create([
            'name' => $request->name,
            'bio'  => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully!',
            'data'    => $author
        ], 201);
    }
}