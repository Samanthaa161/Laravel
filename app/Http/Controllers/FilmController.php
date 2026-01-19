<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 

class FilmController extends Controller
{
    private array $films = [
    ['title' => 'The Godfather', 'year' => 1972, 'genre' => 'Drama'],
    ['title' => 'Pulp Fiction', 'year' => 1994, 'genre' => 'Crime'],
    ['title' => 'Inception', 'year' => 2010, 'genre' => 'Sci-Fi'],
    ['title' => 'Interstellar', 'year' => 2014, 'genre' => 'Sci-Fi'],
    ['title' => 'Casablanca', 'year' => 1942, 'genre' => 'Romance'],
    ];


    public function createFilm(Request $request)
    {
        $title = $request->input('title');
        $year = $request->input('year');

        // Inicializar sesión si está vacía
        $films = session()->get('films', $this->films);

        if ($this->isFilm($title, $films)) {
            return redirect('/')
                ->with('error', 'Film already exists');
        }

        $films[] = [
            'title' => $title,
            'year' => $year
        ];

        session()->put('films', $films);

        return redirect()->route('films.list');
    }


    public function isFilm($title, $films)
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
    $films = session()->get('films', $this->films);

    // Agrupar por género
    $filmsByGenre = collect($films)->groupBy('genre');

    // Agrupar por año
    $filmsByYear = collect($films)->groupBy('year');

    return view('films.list', compact('films', 'filmsByGenre', 'filmsByYear'));
    }


   public function oldFilms()
    {
    $films = session()->get('films', $this->films);

    usort($films, fn($a, $b) => $a['year'] <=> $b['year']);

    return view('films.list', compact('films'));
    }

    public function newFilms()
    {
        $films = session()->get('films', $this->films);

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
