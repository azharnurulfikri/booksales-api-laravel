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
Route::apiResource('books', BookController::class);


// route per Genrean
Route::apiResource('genres', GenreController::class);


// route author
Route::apiResource('authors', AuthorController::class);