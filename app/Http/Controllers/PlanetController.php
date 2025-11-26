<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Planet;
use Illuminate\Validation\Rule;


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

        $validated = $this->validatePlanet($request);

        Planet::create($validated);

        return redirect()->route('admin.planetes.index')->with('message', 'Planète créée');
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

        $validated = $this->validatePlanet($request, $planete);

        $planete->update($validated);

        return redirect()->route('admin.planetes.index')->with('message', 'Planète mise à jour avec succès.');
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

    private function validatePlanet(Request $request, Planet $planet = null)
    {
        return $request->validate([
            'nom_fr' => [
                'required',
                'string',
                'max:50',
                Rule::unique('planets', 'nom_fr')
                ->ignore($planet->id ?? null),
            ],
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'distance_fr' => 'required|string|max:50',
            'distance_en' => 'required|string|max:50',
            'duree_fr' => 'required|string|max:50',
            'duree_en' => 'required|string|max:50',
            'image' => 'required|max:100|regex:/^[a-zA-Z0-9\/._-]+$/',

        ], [
            'nom_fr.required' => 'Le nom en français est obligatoire.',
            'nom_fr.max' => 'Le nom en français ne peut pas dépasser 50 caractères.',
            'nom_fr.unique' => 'Ce nom en français est déjà utilisé.',
            'nom_en.required' => 'Le nom en anglais est obligatoire.',
            'nom_en.max' => 'Le nom en anglais ne peut pas dépasser 50 caractères.',
            'nom_en.unique' => 'Ce nom en anglais est déjà utilisé.',
            'description_fr.required' => 'La description en français est obligatoire.',
            'description_fr.max' => 'La description en français ne peut pas dépasser 500 caractères.',
            'description_en.required' => 'La description en anglais est obligatoire.',
            'description_en.max' => 'La description en anglais ne peut pas dépasser 500 caractères.',
            'distance_fr.required' => 'La distance en français est obligatoire.',
            'distance_fr.max' => 'La distance en français ne peut pas dépasser 50 caractères.',
            'distance_en.required' => 'La distance en anglais est obligatoire.',
            'distance_en.max' => 'La distance en anglais ne peut pas dépasser 50 caractères.',
            'duree_fr.required' => 'La durée en français est obligatoire.',
            'duree_fr.max' => 'La durée en français ne peut pas dépasser 50 caractères.',
            'duree_en.required' => 'La durée en anglais est obligatoire.',
            'duree_en.max' => 'La durée en anglais ne peut pas dépasser 50 caractères.',
            'image.required' => 'Une URL de votre image est obligatoire.',
            'image.url' => 'Cette URL de votre image n\’est pas valide.',
            'image.max' => 'Une URL de votre image ne peut pas depasser 100 caracteres.',
        ]);
    }
}