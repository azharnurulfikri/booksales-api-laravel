<?php

    namespace Database\Seeders;

    use App\Models\Author;
    use Illuminate\Database\Seeder;

    class AuthorSeeder extends Seeder
    {
        public function run(): void
{
    Author::create(['name' => 'Tere Liye']);      // ID: 1
    Author::create(['name' => 'Buya Hamka']);     // ID: 2
    Author::create(['name' => 'Dee Lestari']);    // ID: 3
    Author::create(['name' => 'Fiersa Besari']);  // ID: 4
    Author::create(['name' => 'Andrea Hirata']);  // ID: 5
}
       
    }
