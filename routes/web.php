<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\TravelController;
use App\Http\Middleware\SetLocal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('travels', TravelController::class);

// Groupe anglais
Route::prefix('en')
    ->middleware(SetLocal::class)
    ->name('en.')
    ->group(function () {
        Route::get('/travels/index', function () {
            return view('travels/index');
        })->name('accueil');

        Route::get('/travels/crew', function () {
            return view('travels/crew');
        })->name('equipage');

        Route::get('/travels/planet', function () {
            return view('travels/planet');
        })->name('planete');

        Route::get('/travels/technology', function () {
            return view('travels/tech');
        })->name('technologie');
    });

// // Groupe français (URL traduite)
Route::prefix('fr')
    ->middleware(SetLocal::class)
    ->name('fr.')
    ->group(function () {
        Route::get('/voyages/index', function () {
            return view('travels/index');
        })->name('accueil');

        Route::get('/voyages/equipage', function () {
            return view('travels/crew');
        })->name('equipage');

        Route::get('/voyages/planete', function () {
            return view('travels/planet');
        })->name('planete');

        Route::get('/voyages/technologie', function () {
            return view('travels/tech');
        })->name('technologie');
    });


Route::get('/planet/{name}', [PlanetController::class, 'publicIndex']);