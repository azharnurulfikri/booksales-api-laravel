<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Kamu harus menambahkan fungsi ini secara manual
    public static function allData()
    {
        return [
            ['title' => 'Dunia Sophie', 'author' => 'Jostein Gaarder', 'category' => 'Filsafat'],
            ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'category' => 'Self Improvement'],
            ['title' => 'Animal Farm', 'author' => 'George Orwell', 'category' => 'Klasik'],
            ['title' => 'Atomic Habits', 'author' => 'James Clear', 'category' => 'Self Improvement'],
            ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'category' => 'Fiksi'],
        ];
    }
}