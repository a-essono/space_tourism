<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Planet;

class PlanetController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Planet::class);

        $planets = Planet::all();
        return view('admin.planets.index', compact('planets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Planet::class);

        return view('admin.planets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Planet::class);

        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'distance_fr' => 'required|string|max:50',
            'distance_en' => 'required|string|max:50',
            'duree_fr' => 'required|string|max:50',
            'duree_en' => 'required|string|max:50',
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
        $planets = Planet::query()->orderBy('id')->get();
        return view('travels.planet', compact('planet', 'planets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        $this->authorize('update', $planet);

        return view('admin.planets.edit', compact('planet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cette ligne (91) n'aurait pas été nécessaire avec un update(Request $request, Planet $planet) recommandé
        $planete = Planet::findOrFail($id);

        $this->authorize('update', $planete);

        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'distance_fr' => 'required|string|max:50',
            'distance_en' => 'required|string|max:50',
            'duree_fr' => 'required|string|max:50',
            'duree_en' => 'required|string|max:50',
            'image' => 'required|url|max:100'
        ]);

        $planete->update($validated);

        return redirect()->route('planetes.index')->with('message', 'Planète mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        $this->authorize('delete', $planet);

        $planet->delete();
        return redirect()->route('admin.planetes.index')->with('message', 'Planète détruite avec succès.');
    }
}