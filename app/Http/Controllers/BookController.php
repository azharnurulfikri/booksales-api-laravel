<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; 

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!" 
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|integer',
            'stock'        => 'required|integer',
            'cover_photo'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id'     => 'required|exists:genres,id',
            'author_id'    => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }

        // Upload Image 
        $image = $request->file('cover_photo');
        // Simpan ke storage/app/public/books
        $image->storeAs('public/books', $image->hashName());

        $book = Book::create([
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id'    => $request->genre_id,
            'author_id'   => $request->author_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully!',
            'data'    => $book
        ], 201);
    } 

    // update data
     public function update(Request $request, string $id)
    {
        // 1. Cari data bukunya dulu
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // 2. Validator 
        $validator = Validator::make($request->all(), [
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|integer',
            'stock'        => 'required|integer',
            'cover_photo'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id'     => 'required|exists:genres,id',
            'author_id'    => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }

        // 3. Logika Update Foto
        if ($request->hasFile('cover_photo')) {
            // Hapus foto lama dari storage jika ada
            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            // Upload foto baru
            $image = $request->file('cover_photo');
            $image->storeAs('public/books', $image->hashName());
            
            // Update nama file baru ke object book
            $book->cover_photo = $image->hashName();
        }

        // 4. Update data lainnya
        $book->update([
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'cover_photo' => $book->cover_photo, // Tetap gunakan yang lama jika tidak ganti
            'genre_id'    => $request->genre_id,
            'author_id'   => $request->author_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully!',
            'data'    => $book
        ], 200);
    }



    public function show(string $id) {
        $book = Book::find($id);
        
        if(!$book){
            return response()->json([
            'success' => false,
            'message' => 'Data not found',
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data'    => $book
        ], 200);
    }

    public function destroy(string $id) { 
        $book = Book::find($id);

        if(!$book){
            return response()->json([
            'success' => false,
            'message' => 'Data not found',
            ], 404);
        }

        // Hapus Foto
        if($book->cover_photo){
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        // Hapus Data
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted'
        ], 200);
    }
}