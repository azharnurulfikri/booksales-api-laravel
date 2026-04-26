<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Tambahkan description agar bisa diisi lewat Seeder/Controller
    protected $fillable = ['name', 'description'];
}