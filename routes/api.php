    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AuthorController;
    use App\Http\Controllers\BookController;
    use App\Http\Controllers\GenreController;
    use App\Http\Controllers\TransactionController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | 1. PUBLIC ROUTES (Tanpa Login)
    |--------------------------------------------------------------------------
    */
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Read-only untuk semua orang
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{id}', [GenreController::class, 'show']);
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);

    /*
    |--------------------------------------------------------------------------
    | 2. PROTECTED ROUTES (Wajib Login)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth:api'])->group(function () {
        
        // Fitur Transaksi untuk Pembeli
        Route::post('/transactions', [TransactionController::class, 'store']);
        Route::get('/transactions/{id}', [TransactionController::class, 'show']);
        
        Route::post('/logout', [AuthController::class, 'logout']);

        /*
        |--------------------------------------------------------------------------
        | 3. ADMIN ONLY (Login + Admin Role)
        |--------------------------------------------------------------------------
        */
        Route::middleware(['checkrole:admin'])->group(function () {
            
            // Admin bisa lihat semua daftar transaksi
            Route::get('/transactions', [TransactionController::class, 'index']);
            
            // CRUD Master Data (Except index & show karena sudah ada di publik)
            Route::apiResource('authors', AuthorController::class)->except(['index', 'show']);
            Route::apiResource('genres', GenreController::class)->except(['index', 'show']);
            Route::apiResource('books', BookController::class)->except(['index', 'show']);
        });
    });