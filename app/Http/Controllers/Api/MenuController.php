<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Planet;
use App\Models\Crew;
use App\Models\Technology;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Récupère la locale
        $locale = app()->getLocale();

        // ucfirstLang uc(upper case) first(première lettre) génèré côté PHP
        $format = fn($text) => mb_strtoupper(mb_substr($text, 0, 1)) . mb_strtolower(mb_substr($text, 1));

        // Récupère les first elements pour les liens par défaut
        $defaultPlanet = Planet::first();
        $defaultCrew = Crew::first();
        $defaultTech = Technology::first();

        // Construction du menu
        $menu = [
            [
                'label' => $format(__('messages.home')),
                'url' => route($locale . '.accueil')
            ],
            [
                'label' => $format(__('messages.destination')),
                'url' => route($locale . '.planete', $defaultPlanet)
            ],
            [
                'label' => $format(__('messages.crew')),
                'url' => route($locale . '.equipage', $defaultCrew)
            ],
            [
                'label' => $format(__('messages.technology')),
                'url' => route($locale . '.technologie', $defaultTech)
            ],
        ];

        return response()->json($menu);
    }
}
