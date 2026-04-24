<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;


Route::get('/', function () {
    return view('welcome');
});

// Ganti rute yang lama dengan ini
Route::get('/books', [BookController::class, 'index']);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/authors', [AuthorController::class, 'index']);