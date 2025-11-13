<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On vide la table avant d'insérer pour éviter les doublons
        Technology::truncate();

        $technologies = [
            [
                'nom_fr' => 'Le lanceur',
                'description_fr' => "Un lanceur ou une fusée porteuse est un véhicule propulsé par fusée utilisé pour transporter 
                                    une charge utile de la surface de la Terre vers l\'espace, habituellement vers l\'orbite terrestre 
                                    ou au-delà. Notre fusée WEB-X est la plus puissante en service. Debout à 150 mètres de hauteur,
                                    elle donne lieu à un impressionnant spectacle sur le pas de tir !",
                'nom_en' => 'The launcher',
                'description_en' => "A launch vehicle or carrier rocket is a rocket-powered vehicle used to transport 
                                    a payload from the Earth\'s surface into space, usually into Earth orbit 
                                    or beyond. Our WEB-X rocket is the most powerful in service. Standing 150 meters tall,
                                    it puts on an impressive show on the launch pad!",
                'image' => 'http://127.0.0.1:8000/build/images/soyuz1.jpg',
            ],
            [
                'nom_fr' => 'Le spatioport',
                'description_fr' => "Un spatioport ou cosmodrome est un site de lancement (ou de réception) d’engins spatiaux, 
                                    par analogie avec le port maritime pour les navires ou l’aéroport pour les aéronefs. Basé au célèbre Cap Canaveral, 
                                    notre spatioport est idéalement situé pour profiter de la rotation de la Terre pour le lancement.",
                'nom_en' => 'The spaceport',
                'description_en' => "A spaceport or cosmodrome is a site for launching (or receiving) spacecraft, 
                                    similar to a seaport for ships or an airport for aircraft. Based at the famous Cape Canaveral, 
                                    our spaceport is ideally located to take advantage of the Earth\'s rotation for launch.",
                'image' => 'http://127.0.0.1:8000/storage/images/soyuz2.jpg',
            ],
            [
                'nom_fr' => 'La capsule spatiale',
                'description_fr' => "Une capsule spatiale est un engin spatial habitable qui utilise une capsule à corps émoussé 
                                    pour rentrer dans l’atmosphère terrestre sans ailes. Notre capsule est l’endroit 
                                    où vous passerez votre temps pendant le vol. Il comprend une salle de gym, un cinéma 
                                    et de nombreuses autres activités pour vous divertir.",
                'nom_en' => 'The space capsule',
                'description_en' => "A space capsule is a habitable spacecraft that uses a blunt-bodied capsule 
                                    to reenter Earth\'s atmosphere without wings. Our capsule is where 
                                    you will spend your time during the flight. It includes a gym, a movie theater, 
                                    and many other activities to keep you entertained.",
                'image' => 'http://127.0.0.1:8000/storage/images/soyuz3.jpg',
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::create($tech);
        }
    }
}
