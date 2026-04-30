<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi beserta relasi user dan book
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'resource data not found!',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all transactions',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validation error',
                'data'    => $validator->errors()
            ], 422);
        }

        // 2. Mengambil user yang login (Guard API)
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu',
            ], 401);
        }

        // 3. Mencari data buku
        $book = Book::find($request->book_id);

        // 4. Cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message'  => 'stok barang tidak cukup!',
            ], 400);
        }

        // 5. Hitung total harga & Generate Unique Code
        $uniqueCode = "ORD-" . strtoupper(uniqid());
        $totalAmount = $book->price * $request->quantity;

        // 6. Simpan Transaksi (Pastikan semua kolom terisi)
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id'  => $user->id,
            'book_id'      => $request->book_id,
            'quantity'     => $request->quantity,
            'total_amount' => $totalAmount,
            'status'       => 'pending' 
        ]);

        // 7. Kurangi stok buku 
        $book->stock -= $request->quantity;
        $book->save();

        // 8. Return response sukses
        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat',
            'data'    => $transaction
        ], 201);
    }
}