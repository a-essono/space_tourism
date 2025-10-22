<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planet;

class PlanetController extends Controller
{
    public function index()
    {
        $planets = Planet::all();
        return view('admin.planets.index', compact('planets'));

        // Test planet.blade.php avec $name pour paramètre de la fct° publicIndex($name)
        // $planets = [
        //     'name' => $name,
        //     'image' => '/images/moon_space.jpg',
        // ];

        // return view('planets', compact('planets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump('je suis dans le controleur');
        // exit;
        // dd($request->all());

        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'distance_fr' => 'required|numeric',
            'distance_en' => 'required|numeric',
            'duree_fr' => 'required|numeric',
            'duree_en' => 'required|numeric',
            'image' => 'required|url|max:100'
        ]);

        Planet::create($validated);

        return redirect()->route('planetes.index')->with('message', 'Planète créée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        return view('travels.planet', compact('planet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        return view('admin.planets.edit', compact('planet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'nom_fr' => 'required|string|max:50',
        'nom_en' => 'required|string|max:50',
        'description_fr' => 'required|string|max:500',
        'description_en' => 'required|string|max:500',
        'distance_fr' => 'required|numeric',
        'distance_en' => 'required|numeric',
        'duree_fr' => 'required|numeric',
        'duree_en' => 'required|numeric',
        'image' => 'required|url|max:100'
    ]);

    $planete = Planet::findOrFail($id);
    $planete->update($validated);

    return redirect()->route('planetes.index')->with('message', 'Planète mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        var_dump('Je suis dans destroy');
        $planet->delete();
        return redirect()->route('planetes.index')->with('message', 'Planète détruite avec succès.');
    }
}