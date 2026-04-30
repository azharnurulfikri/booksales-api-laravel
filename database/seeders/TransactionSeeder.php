<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-001',
            'customer_id'  => 2,
            'book_id'      => 1,
            'quantity'     => 1, 
            'total_amount' => 250000.00,
            'status'       => 'pending'
        ]);

        Transaction::create([
            'order_number' => 'ORD-002', 
            'customer_id'  => 2,
            'book_id'      => 2,
            'quantity'     => 1, 
            'total_amount' => 50000.00,
            'status'       => 'pending'
        ]);

        Transaction::create([
            'order_number' => 'ORD-003', 
            'customer_id'  => 1,
            'book_id'      => 1,
            'quantity'     => 2, 
            'total_amount' => 200000,
            'status'       => 'pending'
        ]);
    }
}