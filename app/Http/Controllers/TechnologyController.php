<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use App\Models\Technology;
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

        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'image' => 'required|url|max:100'
        ]);

        Technology::create($validated);

        return redirect()->route('technologies.index')->with('message', 'Technologie déployée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {

        $technologies = Technology::query()->orderBy('id', )->get('id');
        return view('travels.tech', compact('technology', 'technologies'));
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

        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'image' => 'required|url|max:100'
        ]);
        
        $technology->update($validated);

        return redirect()->route('technologies.index')->with('message', 'Technologie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $this->authorize('delete', $technology);
        
        $technology->delete();
        return redirect()->route('technologies.index')->with('message', 'Technologie détruite avec succès');
    }
}
