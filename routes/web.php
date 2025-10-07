<?php

use App\Http\Controllers\PlanetController;
use App\Http\Controllers\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('travels', TravelController::class);

Route::get('/travels/index', function(){
    return view('travels/index');
})->name('accueil');

Route::get('/travels/crew', function(){
    return view('travels/crew');
})->name('equipage');

Route::get('/travels/planet', function(){
    return view('travels/planet');
})->name('planete');

Route::get('/travels/tech', function(){
    return view('travels/tech');
})->name('technologie');

Route::get('/planet/{name}', [PlanetController::class, 'publicIndex']);