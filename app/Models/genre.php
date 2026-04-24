<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function allData()
    {
        return [
            ['id' => 1, 'name' => 'Filsafat'],
            ['id' => 2, 'name' => 'Self Improvement'],
            ['id' => 3, 'name' => 'Klasik'],
            ['id' => 4, 'name' => 'Teknologi'],
            ['id' => 5, 'name' => 'Sains'],
        ];
    }
}