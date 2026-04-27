<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // READ ALL DATA
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            "success" => true,
            "message" => "Get all genres",
            "data" => $genres
        ], 200);
    }

    // CREATE DATA
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }

        $genre = Genre::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Genre created successfully!',
            'data'    => $genre
        ], 201);
    }


  
// menampilkan data dari id
    public function show(string $id) {
        
        $genre =Genre::find($id);
        if(!$genre){
            return response()->json([
            'success' => false,
            'message' => 'Data not found',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data'    => $genre
        ], 200);
    }


    // update data genre
     public function update(Request $request, string $id)
    {
        // 1. Cari data 
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // 2. Validator 
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }


        // 4. Update data lainnya
        $genre->update([
            'name'       => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Genre updated successfully!',
            'data'    => $genre
        ], 200);
    }


    public function destroy(string $id) { 
        $genre = Genre::find($id);

        if(!$genre){
            return response()->json([
            'success' => false,
            'message' => 'Data not found',
            ], 404);
        }

       

        // Hapus Data
        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted'
        ], 200);
    }
}