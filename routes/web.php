<?php

use App\Http\Controllers\CrewController;
use App\Http\Controllers\PlanetController;
// use App\Http\Controllers\TravelController;
use App\Http\Controllers\TechnologyController;
use App\Http\Middleware\SetLocal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('travels', TravelController::class);

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

// Route Test planet.blade.php avec $name pour paramètre de la fct° publicIndex($name)
// Route::get('/planet/{name}', [PlanetController::class, 'publicIndex']);

/**
 * PLANET
 **/
Route::get('admin/planetes', [PlanetController::class, 'index'])->name('planetes.index');
// Affiche le formulaire de création
Route::get('admin/planetes/creation', [PlanetController::class, 'create'])->name('planetes.create');
// Enregistre une nouvelle planète
Route::post('admin/planetes/enregistrement', [PlanetController::class, 'store'])->name('planetes.store');
// Affiche le formulaire de modification pour une planète spécifique
Route::get('admin/planetes/{planet}/modification', [PlanetController::class, 'edit'])->where('planet', '[0-9]+')->name('planetes.edit');
// Met à jour les données d'une planète existante
Route::put('admin/planetes/{planet}', [PlanetController::class, 'update'])->where('planet', '[0-9]+')->name('planetes.update');
// Supprime une planète existante
Route::delete('admin/planetes/{planet}/suppression', [PlanetController::class, 'destroy'])->where('planet', '[0-9]+')->name('planetes.destroy');

/**
 * CREW
 **/
Route::get('admin/equipes', [CrewController::class, 'index'])->name('equipes.index');
Route::get('admin/equipes/creation', [CrewController::class, 'create'])->name('equipes.create');
Route::post('admin/equipes/enregistrement', [CrewController::class, 'store'])->name('equipes.store');
Route::get('admin/equipes/{crew}/modification', [CrewController::class, 'edit'])->where('crew', '[0-9]+')->name('equipes.edit');
Route::put('admin/equipes/{crew}', [CrewController::class, 'update'])->where('crew', '[0-9]+')->name('equipes.update');
// Supprime une équipe existante
Route::delete('admin/equipes/{crew}/suppression', [CrewController::class, 'destroy'])->where('crew', '[0-9]+')->name('equipes.destroy');

/**
 * TECH
 **/
Route::get('admin/technologies', [TechnologyController::class, 'index'])->name('technologies.index');
Route::get('admin/technologies/creation', [TechnologyController::class, 'create'])->name('technologies.create');
Route::post('admin/technologies/enregistrement', [TechnologyController::class, 'store'])->name('technologies.store');
Route::get('admin/technologies/{technology}/modification', [TechnologyController::class, 'edit'])->where('technology','[0-9]+')->name('technologies.edit');
Route::put('admin/technologies/{technology}', [TechnologyController::class, 'update'])->where('technology', '[0-9]+')->name('technologies.update');
// Supprime une technologie existante
Route::delete('admin/technologies/{technology}', [TechnologyController::class, 'destroy'])->where('technology', '[0-9]+')->name('technologies.destroy');