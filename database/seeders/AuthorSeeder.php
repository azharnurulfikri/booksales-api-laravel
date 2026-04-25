<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Tere Liye', 'bio' => 'Penulis produktif asal Indonesia.'],
            ['name' => 'Haidar Musyafa', 'bio' => 'Penulis biografi tokoh-tokoh Islam.'],
            ['name' => 'Dee Lestari', 'bio' => 'Penulis seri Supernova yang fenomenal.'],
            ['name' => 'Fiersa Besari', 'bio' => 'Penulis sekaligus pemusik dan penggiat alam.'],
            ['name' => 'Andrea Hirata', 'bio' => 'Penulis Laskar Pelangi yang mendunia.'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}