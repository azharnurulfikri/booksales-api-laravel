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


    // MENAMPILKAN DATA BERDASARKAN ID
    public function show(string $id) {
    
    $author =Author::find($id);
    if(!$author){
        return response()->json([
        'success' => false,
        'message' => 'Data not found',
        ], 404);
    }
    
    return response()->json([
        'success' => true,
        'message' => 'Get detail resource',
        'data'    => $author
    ], 200);
    }


//UPDATE DATA AUTHOR
     public function update(Request $request, string $id)
    {
        // 1. Cari data 
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // 2. Validator 
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'bio'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }


        // 4. Update data lainnya
        $author->update([
            'name'       => $request->name,
            'bio' => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'author updated successfully!',
            'data'    => $author
        ], 200);
    }


    public function destroy(string $id) { 
        $author = Author::find($id);

        if(!$author){
            return response()->json([
            'success' => false,
            'message' => 'Data not found',
            ], 404);
        }

       

        // Hapus Data
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted'
        ], 200);
    }
}
    