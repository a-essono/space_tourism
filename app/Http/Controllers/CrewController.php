<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crews = Crew::all();
        return view('admin.crews.index', compact('crews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_fr' => 'required|string|max:50',
            'role_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'nom' => 'required|string|max:50',
            'image' => 'required|url|max:100'
        ]);

        Crew::create($validated);
        
        return redirect()->route('equipes.index')->with('message', 'Équipe formée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crew $crew)
    {
        return view('travels.crew', compact('crew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crew $crew)
    {
        return view('admin.crews.edit', compact('crew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crew $crew)
    {
        $validated = $request->validate([
            'role_fr' => 'required|string|max:50',
            'role_en' => 'required|string|max:50',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'nom' => 'required|string|max:50',
            'image' => 'required|url|max:50'
        ]);

        $crew->update($validated);

        return redirect()->route('equipes.index')->with('message', 'Équipe mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crew $crew)
    {
        $crew->delete();
        return redirect()->route('equipes.index')->with('message', 'Équipe détruites avec succès');
    }
}
