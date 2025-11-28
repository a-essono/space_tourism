<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Crew::class);

        $crews = Crew::all();
        return view('admin.crews.index', compact('crews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Crew::class);

        return view('admin.crews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Crew::class);

        $validated = $this->validateCrew($request);

        Crew::create($validated);

        return redirect()->route('admin.equipes.index')->with('message', 'Équipe formée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crew $crew)
    {
        $crews = Crew::query()->orderBy('id')->get('id');

        // Index réel des membres d'équipages courante
        $indexCount = $crews->search(function ($c) use ($crew) {
            return $c->id === $crew->id;
        }) + 1;

        return view('travels.crew', compact('crew', 'crews', 'indexCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crew $crew)
    {
        $this->authorize('update', $crew);

        return view('admin.crews.edit', compact('crew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crew $crew)
    {
        $this->authorize('update', $crew);

        $validated = $this->validateCrew($request, $crew);

        $crew->update($validated);

        return redirect()->route('admin.equipes.index')->with('message', 'Équipe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crew $crew)
    {
        $this->authorize('delete', $crew);

        $crew->delete();
        return redirect()->route('admin.equipes.index')->with('message', 'Équipe détruites avec succès');
    }

    /**
     * Validation commune pour store et update.
     */
    private function validateCrew(Request $request, Crew $crew = null)
    {
        return $request->validate([
            'role_fr' => 'required|string|max:50',
            'role_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'nom' => [
                'required',
                'string',
                'max:50',
                Rule::unique('crews', 'nom')
                    ->ignore($crew->id ?? null),
            ],
            'image' => 'required|max:100|regex:/^[a-zA-Z0-9\/._-]+$/',
        ], [
            'role_fr.required' => 'Le rôle en français est obligatoire.',
            'role_fr.max' => 'Le rôle en français ne peut pas dépasser 50 caractères.',
            'role_en.required' => 'Le rôle en anglais est obligatoire.',
            'role_en.max' => 'Le rôle en anglais ne peut pas dépasser 50 caractères.',
            'description_fr.required' => 'La description en français est obligatoire.',
            'description_fr.max' => 'La description en français ne peut pas dépasser 500 caractères.',
            'description_en.required' => 'La description en anglais est obligatoire.',
            'description_en.max' => 'La description en anglais ne peut pas dépasser 500 caractères.',
            'nom.required' => 'Le nom du membre est obligatoire.',
            'nom.max' => 'Le nom du membre ne peut pas dépasser 50 caractères.',
            'nom.unique' => 'Ce nom est déjà utilisé pour un autre membre.',
            'image.required' => 'Une URL de votre image est obligatoire.',
            'image.url' => 'Cette URL de votre image n\'est pas valide.',
            'image.max' => 'Une URL de votre image ne peut pas dépasser 100 caractères.',
        ]);
    }
}
