<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use App\Models\technology;
class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_fr' => 'required|string|max:50',
            'nom_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'image' => 'required|url|max:100'
        ]);

        technology::create($validated);

        return redirect()->route('technologies.index')->with('message', 'Technologie déployée');
    }

    /**
     * Display the specified resource.
     */
    public function show(technology $technology)
    {
        return view('travels.tech', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, technology $technology)
    {
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
    public function destroy(technology $technology)
    {
        $technology->delete();
        return redirect()->route('technologies.index')->with('message', 'Technologie détruite avec succès');
    }
}
