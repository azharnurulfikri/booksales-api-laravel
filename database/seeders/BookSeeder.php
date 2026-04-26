<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data 1
        Book::create([
            'title' => 'Bumi',
            'description' => 'Petualangan di dunia paralel karya Tere Liye.',
            'price' => 95000,
            'stock' => 50,
            'cover_photo' => 'bumi.jpg',
            'genre_id' => 3,
            'author_id' => 1,
        ]);

        // Data 2
        Book::create([
            'title' => 'Hamka',
            'description' => 'Kisah inspiratif perjalanan hidup Buya Hamka.',
            'price' => 85000,
            'stock' => 30,
            'cover_photo' => 'hamka.jpg',
            'genre_id' => 1,
            'author_id' => 2,
        ]);

        // Data 3
        Book::create([
            'title' => 'Perahu Kertas',
            'description' => 'Kisah tentang radar hati dan impian yang hanyut.',
            'price' => 75000,
            'stock' => 45,
            'cover_photo' => 'perahu_kertas.jpg',
            'genre_id' => 2,
            'author_id' => 3,
        ]);

        // Data 4
        Book::create([
            'title' => 'Garis Waktu',
            'description' => 'Kumpulan surat-surat tentang kenangan dan pengharapan.',
            'price' => 65000,
            'stock' => 25,
            'cover_photo' => 'garis_waktu.jpg',
            'genre_id' => 2,
            'author_id' => 4,
        ]);

        // Data 5
        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Perjuangan sepuluh anak di Belitong dalam meraih mimpi.',
            'price' => 89000,
            'stock' => 60,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 1,
            'author_id' => 5,
        ]);
    }
}