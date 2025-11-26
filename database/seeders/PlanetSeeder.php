<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planet;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On vide la table avant d'insérer pour éviter les doublons
        Planet::truncate();

        $planets = [
            [
                'nom_fr' => 'Lune',
                'description_fr' => "Voyez notre planète comme vous ne l\'avez jamais vue auparavant.
                                    Un parfait voayage de détente pour vous aider à prendre du recul 
                                    et revenir requinquer. Pendant que vous y êtes, plangez-vous dans l\'histoire 
                                    en visitant les sites d\'atterrissage de Luna 2 et Apollo 11.",
                'distance_fr' => '384 000 km',
                'duree_fr' => '3 jours',
                'nom_en' => 'Moon',
                'description_en' => "See our planet as you have never seen it before. A perfect relaxing journey 
                                    to help you to have some perspective and come back refreshed. While you are there, 
                                    dive into the story when visiting the landing site of Luna 2 and Apollo 11.",
                'distance_en' => '384 000 km',
                'duree_en' => '3 days',
                'image' => 'http://127.0.0.1:8000/storage/images/moon.png',
            ],
            [
                'nom_fr' => 'Mars',
                'description_fr' => "N\'oubliez pas vos bottes de randonnée. Vous en aurez besoin pour gravir le mont Olympus, 
                                    la plus haute montagne planétaire dans notre système solaire. Il fait deux fois et demie la taille de l\'Everest!",
                'distance_fr' => '225 Gm',
                'duree_fr' => '9 mois',
                'nom_en' => 'Mars',
                'description_en' => "Don’t forget your walking / rambling / hiking boots. You will need them for climbing Olympus’ mountain, 
                                    the highest planetary mountain in our solar system. It is two and a half times the size of Mount Everest.",
                'distance_en' => '225 Gm',
                'duree_en' => '9 months',
                'image' => 'http://127.0.0.1:8000/storage/images/mars.png',
            ],
            [
                'nom_fr' => 'Europe',
                'description_fr' => "La plus petite des quatre lunes galiléennes en orbite autour de Jupiter, Europe est le rêve des amoureux de  l\'hiver. 
                                    Sa surface glacée est parfaite pour faire un peu de patin à glace, du curling, du hockey 
                                    ou tout simplement pour vous détentre dans votre confortable chalet hivernal.",
                'distance_fr' => '628 Gm',
                'duree_fr' => '3 ans',
                'nom_en' => 'Europa',
                'description_en' => "The smallest of the four Galilean moons in orbit around Jupiter, Europa is the winter lover’s dream.  
                                    Her frozen surface is perfect for ice skating, curling, hockey, 
                                    or just simply to relax in a comfortable winter chalet.",
                'distance_en' => '628 Gm',
                'duree_en' => '3 years',
                'image' => 'http://127.0.0.1:8000/storage/images/europa.png',
            ],
            [
                'nom_fr' => 'Titan',
                'description_fr' => "La seule lune connue pour avoir une atmosphère dense autre que la Terre, 
                                    Titan est comme une maison loin de la maison (et juste quelques centaines de degrés plus froid !). 
                                    En bonus, vous pouvez contemplez des vues saisissantes des anneaux de Saturne.",
                'distance_fr' => '1,6 Tm',
                'duree_fr' => '7 ans',
                'nom_en' => 'Titan',
                'description_en' => "The only moon known to have a dense atmosphere other than Earth, 
                                    Titan is like a home away from home (and just a few hundred degrees colder!). 
                                    As a bonus, you can you can contemplate the amazing views of Saturn\'s rings.",
                'distance_en' => '1.6 Tm',
                'duree_en' => '7 years',
                'image' => 'http://127.0.0.1:8000/storage/images/titan.png',
            ],
        ];

        foreach ($planets as $planet) {
            Planet::updateOrCreate(
                ['nom_fr' => $planet['nom_fr']], // empêche les doublons si tu relances
                $planet
            );
        }
    
    }
}



