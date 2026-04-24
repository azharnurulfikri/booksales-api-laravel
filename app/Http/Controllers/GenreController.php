<?php

namespace App\Http\Controllers;

class GenreController extends Controller
{
   public function index()
{
    $genres = \App\Models\Genre::allData();
    return view('genres.index', compact('genres'));
}
}