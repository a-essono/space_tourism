<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * Summary of test_route_planet / Exemple de test sur une route
     * @return void
     */
    public function test_route_planet()
    {
        $response = $this->get('/en/travels/planet');

        $response->assertStatus(200);
        $response->assertViewIs('travels.planet'); // Optionnel mais recommandé
    }

    public function test_all_route()
    {
        $routes = [
            '/en/travels/index'     => 'travels.index',
            '/en/travels/crew'      => 'travels.crew',
            '/en/travels/planet'    => 'travels.planet',
            '/en/travels/technology'=> 'travels.tech',
            
            '/fr/voyages/index'     => 'travels.index',
            '/fr/voyages/equipage'  => 'travels.crew',
            '/fr/voyages/planete'   => 'travels.planet',
            '/fr/voyages/technologie'=> 'travels.tech',
        ];

        foreach ($routes as $url => $view) {
            $response = $this->get($url);

            $response->assertStatus(200, "Route [$url] ne retourne pas 200");
            $response->assertViewIs($view, "Route [$url] ne retourne pas la vue [$view]");
        }
    }
}
