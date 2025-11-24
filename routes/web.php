<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Middleware\SetLocal;
use App\Models\technology;
use Illuminate\Support\Facades\Route;

/**
 * Route Breeze
 **/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Route::resource('travels', TravelController::class);
 **/

$languages = [
    'en' => [
        'prefix' => 'travels',
        'names' => 'en.',
    ],
    'fr' =>[
        'prefix' => 'voyages',
        'names' => 'fr.',
    ],
];

foreach ($languages as $locale => $config) {
    Route::prefix($locale)
        ->middleware(SetLocal::class)
        ->name($config['names'])
        ->group(function () use ($config) {
            Route::prefix($config['prefix'])->group(function () {
               Route::get('/index', function () {
                    return view('travels/index');
                })->name('accueil'); 

                Route::get('/crew/{crew}', [CrewController::class, 'show'])
                    ->name('equipage');

                Route::get('/planet/{planet}', [PlanetController::class, 'show'])
                    ->name('planete');

                Route::get('/technology/{technology}', [TechnologyController::class, 'show'])
                    ->name('technologie');
            });
        });
}

/**
 * Route Breeze du fichier auth.php
 **/
require __DIR__.'/auth.php';

/**
 * Tableau de bord principal
 **/
Route::get('/dashboard', function () {
    return view('dashboard', [
        'planetCount' => \App\Models\Planet::count(),
        'crewCount' => \App\Models\Crew::count(),
        'techCount' => \App\Models\Technology::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Route Admin
 **/
Route::prefix('dashboard')
->name('admin.')
->middleware(['auth', 'verified'])
->group(function () {
/**
 * Route Admin HOME
 **/
// Page d'accueil admin pour la gestion des listes
Route::get('/home', [\App\Http\Controllers\Admin\AdminHomeController::class, 'index'])->name('home');

/**
 * Route Admin PLANET
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
 * Route Admin CREW
 **/
Route::get('admin/equipes', [CrewController::class, 'index'])->name('equipes.index');
Route::get('admin/equipes/creation', [CrewController::class, 'create'])->name('equipes.create');
Route::post('admin/equipes/enregistrement', [CrewController::class, 'store'])->name('equipes.store');
Route::get('admin/equipes/{crew}/modification', [CrewController::class, 'edit'])->where('crew', '[0-9]+')->name('equipes.edit');
Route::put('admin/equipes/{crew}', [CrewController::class, 'update'])->where('crew', '[0-9]+')->name('equipes.update');
// Supprime une équipe existante
Route::delete('admin/equipes/{crew}/suppression', [CrewController::class, 'destroy'])->where('crew', '[0-9]+')->name('equipes.destroy');

/**
 * Route Admin TECH
 **/
Route::get('admin/technologies', [TechnologyController::class, 'index'])->name('technologies.index');
Route::get('admin/technologies/creation', [TechnologyController::class, 'create'])->name('technologies.create');
Route::post('admin/technologies/enregistrement', [TechnologyController::class, 'store'])->name('technologies.store');
Route::get('admin/technologies/{technology}/modification', [TechnologyController::class, 'edit'])->where('technology','[0-9]+')->name('technologies.edit');
Route::put('admin/technologies/{technology}', [TechnologyController::class, 'update'])->where('technology', '[0-9]+')->name('technologies.update');
// Supprime une technologie existante
Route::delete('admin/technologies/{technology}', [TechnologyController::class, 'destroy'])->where('technology', '[0-9]+')->name('technologies.destroy');
});

/**
 * Route Admin avec un users.manage
 **/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth','verified','permission:crews.view']) // ou 'role:admin'
    ->group(function () {
        // Gestion des rôles assignés aux utilisateurs
        Route::get('users', [UserRoleController::class, 'index'])->name('users.index');
        Route::get('users/{user}/roles', [UserRoleController::class, 'edit'])->name('users.roles.edit');
        Route::put('users/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
    });


