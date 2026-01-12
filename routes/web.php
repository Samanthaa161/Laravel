<?php

use App\Http\Controllers\FilmController;
use App\Http\Middleware\ValidateYear;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateUrl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/films/list', [FilmController::class, 'list'])
    ->name('films.list');

Route::get('/films/old', [FilmController::class, 'oldFilms'])
    ->name('films.old');

Route::get('/films/new', [FilmController::class, 'newFilms'])
    ->name('films.new');

Route::prefix('filmin')->middleware(ValidateUrl::class)->group(function () {
    Route::post('/film', [FilmController::class, 'createFilm'])->name('film');
});

Route::prefix('films')->group(function () {
    Route::get('/list', [FilmController::class, 'list'])->name('films.list');
});

Route::get('/films/count', [FilmController::class, 'countFilms'])->name('films.count');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('year')->group(function() {
    Route::group(['prefix'=>'filmout'], function(){
        // Routes included with prefix "filmout"
        Route::get('oldFilms/{year?}',[FilmController::class, "listOldFilms"])->name('oldFilms');
        Route::get('newFilms/{year?}',[FilmController::class, "listNewFilms"])->name('newFilms');
        Route::get('films/{year?}/{genre?}',[FilmController::class, "listFilms"])->name('listFilms');
        Route::get('count',action:[FilmController::class, "countFilms"])->name(name:'countFilms');

    });
});


