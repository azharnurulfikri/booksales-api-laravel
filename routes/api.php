<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Semua Orang Bisa Akses)
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Read & Show untuk Author dan Genre (Tanpa Login)
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Wajib Login & Punya Role Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:api', 'checkrole:admin'])->group(function () {
    
    // Create, Update, Destroy untuk Author
    Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
    
    // Create, Update, Destroy untuk Genre
    Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
    
    // Create, Update, Destroy untuk Books
    Route::apiResource('books', BookController::class)->except(['index', 'show']);

    // Logout juga perlu ditaruh di sini
    Route::post('/logout', [AuthController::class, 'logout']);
});