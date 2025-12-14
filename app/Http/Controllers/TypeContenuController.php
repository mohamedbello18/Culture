<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate; // Import Gate facade

class TypeContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeContenus = TypeContenu::orderBy('id_type', 'desc')->paginate(10);
        return view('type_contenus.index', compact('typeContenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_contenus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100|unique:type_contenus',
            'description' => 'nullable|string|max:500',
            'icone_css' => 'nullable|string|max:50',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nom);

        TypeContenu::create($data);

        return redirect()->route('type_contenus.index')
                         ->with('success', 'Type de contenu créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $typeContenu = TypeContenu::findOrFail($id);
        return view('type_contenus.show', compact('typeContenu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $typeContenu = TypeContenu::findOrFail($id);
        return view('type_contenus.edit', compact('typeContenu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:100|unique:type_contenus,nom,' . $id . ',id_type',
            'description' => 'nullable|string|max:500',
            'icone_css' => 'nullable|string|max:50',
        ]);

        $typeContenu = TypeContenu::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nom);

        $typeContenu->update($data);

        return redirect()->route('type_contenus.index')
                         ->with('success', 'Type de contenu mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete'); // Apply authorization check

        $typeContenu = TypeContenu::findOrFail($id);
        $typeContenu->delete();

        return redirect()->route('type_contenus.index')
                         ->with('success', 'Type de contenu supprimé avec succès.');
    }
}
