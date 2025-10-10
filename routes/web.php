<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\TravelController;
use App\Http\Middleware\SetLocal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('travels', TravelController::class);
Route::middleware(SetLocal::class)->group(function () {
    Route::prefix('{locale}')
        ->where(['locale' => 'en|fr'])
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

            Route::get('/travels/tech', function () {
                return view('travels/tech');
            })->name('technologie');
        });
});


Route::get('/planet/{name}', [PlanetController::class, 'publicIndex']);