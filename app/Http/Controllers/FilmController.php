<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    private array $films = [
        [
            'title' => 'The Godfather',
            'year' => 1972,
            'genre' => 'Crime',
            'country' => 'USA',
            'duration' => 175,
            'image' => ''
        ],
        [
            'title' => 'Pulp Fiction',
            'year' => 1994,
            'genre' => 'Crime',
            'country' => 'USA',
            'duration' => 154,
            'image' => ''
        ],
        [
            'title' => 'Inception',
            'year' => 2010,
            'genre' => 'Sci-Fi',
            'country' => 'USA',
            'duration' => 148,
            'image' => ''
        ],
        [
            'title' => 'Interstellar',
            'year' => 2014,
            'genre' => 'Sci-Fi',
            'country' => 'USA',
            'duration' => 169,
            'image' => ''
        ],
        [
            'title' => 'Casablanca',
            'year' => 1942,
            'genre' => 'Romance',
            'country' => 'USA',
            'duration' => 102,
            'image' => ''
        ],
    ];

    public function createFilm(Request $request)
    {
        // 1Validación completa
        $request->validate([
            'title'    => 'required|string',
            'year'     => 'required|integer',
            'genre'    => 'required|string',
            'country'  => 'required|string',
            'duration' => 'required|integer',
            'image'    => 'required|url',
        ]);

        // Cargar películas (JSON base + sesión)
        $films = session()->get('films', $this->films);

        // Evitar duplicados
        if ($this->isFilm($request->title, $films)) {
            return redirect('/')
                ->with('error', 'Film already exists');
        }

        // Añadir nueva película (NO borra las anteriores)
        $films[] = [
            'title'    => $request->title,
            'year'     => $request->year,
            'genre'    => $request->genre,
            'country'  => $request->country,
            'duration' => $request->duration,
            'image'    => $request->image,
        ];

        session()->put('films', $films);

        return redirect()->route('films.list');
    }

    private function isFilm(string $title, array $films): bool
    {
        foreach ($films as $film) {
            if (strtolower($film['title']) === strtolower($title)) {
                return true;
            }
        }
        return false;
    }

    public function list()
    {
        // SIEMPRE devuelve todas
        $films = session()->get('films', $this->films);

        $filmsByGenre = collect($films)->groupBy('genre');
        $filmsByYear = collect($films)->groupBy('year');

        return view('films.list', compact('films', 'filmsByGenre', 'filmsByYear'));
    }

     public function oldFilms()
    {
        $films = $this->films;
        usort($films, fn($a, $b) => $a['year'] <=> $b['year']);

        return view('films.list', compact('films'));
    }

    public function newFilms()
    {
        $films = $this->films;
        usort($films, fn($a, $b) => $b['year'] <=> $a['year']);

        return view('films.list', compact('films'));
    }

    public function countFilms()
    {
    $films = session()->get('films', $this->films);
    $filmCount = count($films);

    return view('films.count', compact('filmCount'));
    }
}
