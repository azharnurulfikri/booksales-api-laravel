<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Bumi',
                'description' => 'Petualangan di dunia paralel.',
                'publish_year' => 2014,
                'author_id' => 1,
                'genre_id' => 3, // Asumsi 3 adalah Fantasy
            ],
            [
                'title' => 'Hamka',
                'description' => 'Kisah hidup Buya Hamka.',
                'publish_year' => 2016,
                'author_id' => 2,
                'genre_id' => 1, // Asumsi 1 adalah Action/Lainnya
            ],
            [
                'title' => 'Perahu Kertas',
                'description' => 'Kisah cinta dan impian.',
                'publish_year' => 2009,
                'author_id' => 3,
                'genre_id' => 2, // Asumsi 2 adalah Romance
            ],
            [
                'title' => 'Garis Waktu',
                'description' => 'Kumpulan surat dan cerita.',
                'publish_year' => 2016,
                'author_id' => 4,
                'genre_id' => 2,
            ],
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Perjuangan anak-anak Belitong.',
                'publish_year' => 2005,
                'author_id' => 5,
                'genre_id' => 1,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}