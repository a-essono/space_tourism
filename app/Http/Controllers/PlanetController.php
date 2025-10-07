<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller
{
    public function publicIndex($name){
        $planet = [
            'name' => $name,
            'image' => '/images/moon_space.jpg',
        ];

        return view('planet', compact('planet'));
    }
}