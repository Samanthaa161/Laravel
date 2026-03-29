<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateUrl;
use App\Http\Controllers\ActorController;

Route::resource('films', FilmController::class);

Route::prefix('filmin')->middleware(ValidateUrl::class)->group(function () {
    Route::post('/film', [FilmController::class, 'createFilm'])->name('film');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('films', [FilmController::class, 'list'])->name('films');
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}',[FilmController::class, "listFilms"])->name('listFilms');
        Route::get('count',action:[FilmController::class, "countFilms"])->name('countFilms');
    }); 
});

Route::middleware('year')->group(function() {
    Route::group(['prefix' => 'actorout'], function () {
        Route::get('/actors', [ActorController::class, 'listActors'])->name('actors.list');
        Route::get('/actors/decade/{year}', [ActorController::class, 'listActorsByDecade'])->name('actors.decade');
        Route::get('/actors/count', [ActorController::class, 'countActors'])->name('actors.count');
    });
});

