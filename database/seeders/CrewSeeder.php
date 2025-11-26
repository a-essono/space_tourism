<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Crew;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // On vide la table pour éviter les doublons si on reseed
        Crew::truncate();

        $crews = [
            [
                'role_fr' => 'Commandant',
                'description_fr' => "Douglas Gerald Hurley est un ingénieur américain, un ancien pilote du Coprs des Marines
                                    et un ancien astronaute de la NASA. Il s\'est lancé dans l\'espace pour la troisième fois
                                    en tant que commandant du vaissaux Crew Dragon Demo-2.",
                'role_en' => 'Commander',
                'description_en' => "Douglas Gerald Hurley is an American engineer, 
                                    an older pilot (flyer) in the Navy corps and 
                                    an old astronaut of NASA astronaut. He is launched into space 
                                    for the third time as commander of the Crew Dragon Demo 2 starship.",
                'nom' => 'Douglas Hurley',
                'image' => 'images/commander.png',
            ],
            [
                'role_fr' => 'Spécialiste de mission',
                'description_fr' => "Mark Richard Shuttleworth est le fondateur et PDG de Canonical, 
                                    la société derrière le système d’exploitation Ubuntu basé sur Linux. 
                                    Shuttleworth est devenu le premier sud-africain à voyager dans l’espace 
                                    en tant que touriste spatial.",
                'role_en' => 'Mission specialist',
                'description_en' => "Mark Richard Shuttleworth is the founder and CEO of Canonical, 
                                    the enterprise behind the Ubuntu OS based on Linux. 
                                    Shuttleworth has become the first South-African to travel into space 
                                    as a space tourist.",
                'nom' => 'Mark Shuttleworth',
                'image' => 'images/specialist.png',
            ],
            [
                'role_fr' => 'Pilote',
                'description_fr' => "Pilote du premier vol opérationnel du SpaceX Crew Dragon à destination 
                                    de la Station Spatiale Internationale. Glover est commandant dans la marine américaine, 
                                    où il pilote un F/A-18. Il a été membre de l’équipage de l’Expedition 64 
                                    et a servi comme ingénieur de vol des systèmes de station.",
                'role_en' => 'Pilot',
                'description_en' => "The first pilot of the operational SpaceX Crew Dragon flight with 
                                    the destination of the International Space Station (ISS). Glover is a commander 
                                    in the American Navy, where he pilots a F/A-18. He was a member of the crew of expedition 64 
                                    and he has served as a flight engineer of station systems.",
                'nom' => 'Victor Glover',
                'image' => 'images/pilot.png',
            ],
            [
                'role_fr' => 'Ingénieure de vol',
                'description_fr' => "Anousheh Ansari est une ingénieure Irano-Américaine et cofondatrice de Prodea Systems. 
                                    Ansari était la quatrième touriste de l\'espace autofinancée, la première femme autofinancée à se rendre à l\'ISS, 
                                    et la première iranienne dans l\'espace.",
                'role_en' => 'Flight engineer',
                'description_en' => "Anousheh Ansari is an American-Iranian engineer and cofounder of Podea Systems. 
                                    Ansari was the fourth self-financing tourist in space, the first self-financing woman to go to the ISS, 
                                    and the first Iranian woman in space.",
                'nom' => 'Anousheh Ansari',
                'image' => 'images/engineer.png',
            ],
        ];

        foreach ($crews as $crew) {
            Crew::create($crew);
        }
    }
}
