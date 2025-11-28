<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Technology::class);

        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Technology::class);

        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Technology::class);

        $validated = $this->validateTechnology($request);

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')->with('message', 'Technologie déployée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $technologies = Technology::query()->orderBy('id', )->get('id');

        // Index réel de la technologie courante
    $indexCount = $technologies->search(function ($t) use ($technology) {
        return $t->id === $technology->id;
    }) + 1;

        return view('travels.tech', compact('technology', 'technologies', 'indexCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $this->authorize('update', $technology);

        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $this->authorize('update', $technology);

        $validated = $this->validateTechnology($request, $technology);

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')->with('message', 'Technologie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $this->authorize('delete', $technology);

        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', 'Technologie détruite avec succès');
    }

    private function validateTechnology(Request $request, Technology $technology = null)
    {
        return $request->validate([
            'nom_fr' => [
                'required',
                'string',
                'max:50',
                Rule::unique('technologies', 'nom_fr')->ignore($technology->id ?? null),
            ],
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'image' => 'required|max:100|regex:/^[a-zA-Z0-9\/._-]+$/',
        ], [
            'nom_fr.required' => 'Le nom en français est obligatoire.',
            'nom_fr.max' => 'Le nom en français ne peut pas dépasser 50 caractères.',
            'nom_fr.unique' => 'Ce nom en français est déjà utilisé.',
            'nom_en.required' => 'Le nom en anglais est obligatoire.',
            'nom_en.max' => 'Le nom en anglais ne peut pas dépasser 50 caractères.',
            'description_fr.required' => 'La description en français est obligatoire.',
            'description_fr.max' => 'La description en français ne peut pas dépasser 500 caractères.',
            'description_en.required' => 'La description en anglais est obligatoire.',
            'description_en.max' => 'La description en anglais ne peut pas dépasser 500 caractères.',
            'image.required' => 'Une URL de votre image est obligatoire.',
            'image.url' => 'Cette URL de votre image n\'est pas valide.',
            'image.max' => 'Une URL de votre image ne peut pas dépasser 100 caractères.',
        ]);
    }
}
