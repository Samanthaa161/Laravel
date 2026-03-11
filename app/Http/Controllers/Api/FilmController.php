<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        return Film::with('actors')->get();
    }

    public function show($id)
    {
        return Film::with('actors')->findOrFail($id);
    }
}
