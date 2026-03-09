<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        // Trae todas las películas con sus actores
        $films = Film::with('actors')->get();

        return response()->json($films);
    }
}