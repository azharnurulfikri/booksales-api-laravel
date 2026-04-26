<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang penuh dengan aksi dan ketegangan.'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Genre yang berfokus pada hubungan percintaan.'
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'description' => 'Genre yang melibatkan imajinasi dan dunia sihir.'
        ]);
    }
}