<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function allData()
    {
        return [
            ['id' => 1, 'name' => 'Jostein Gaarder', 'country' => 'Norwegia'],
            ['id' => 2, 'name' => 'Henry Manampiring', 'country' => 'Indonesia'],
            ['id' => 3, 'name' => 'George Orwell', 'country' => 'Inggris'],
            ['id' => 4, 'name' => 'James Clear', 'country' => 'Amerika'],
            ['id' => 5, 'name' => 'Tere Liye', 'country' => 'Indonesia'],
        ];
    }
}