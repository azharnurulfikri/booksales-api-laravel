<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route perbukuan
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);



// route per Genrean
Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);


// route author
Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);