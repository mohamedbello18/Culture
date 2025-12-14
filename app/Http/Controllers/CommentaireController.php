<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate; // Import Gate facade

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     * Pourrait être filtré par contenu dans une application réelle.
     */
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur', 'contenu'])
                                    ->orderBy('id_commentaire', 'desc')
                                    ->paginate(10);

        return view('commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        // Use full_name accessor for better display
        $utilisateurs = User::where('statut', 'actif')
                            ->get()
                            ->mapWithKeys(fn ($user) => [$user->id_utilisateur => $user->full_name]);

        // On conserve la liste des contenus
        $contenus = Contenu::where('statut', 'publie')->pluck('titre', 'id_contenu');

        return view('commentaires.create', compact('utilisateurs', 'contenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'texte' => 'required|string|max:1000',
            'note' => 'nullable|integer|min:1|max:5',
            'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
            'id_contenu' => 'required|exists:contenus,id_contenu',
            'date' => 'nullable|date',
        ]);

        $validatedData['date'] = $validatedData['date'] ?? now();

        Commentaire::create($validatedData);

        return redirect()->route('commentaires.index')->with('success', 'Commentaire publié avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commentaire = Commentaire::with(['utilisateur', 'contenu'])->findOrFail($id);
        return view('commentaires.show', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commentaire = Commentaire::findOrFail($id);

        // Use full_name accessor for better display
        $utilisateurs = User::where('statut', 'actif')
                            ->get()
                            ->mapWithKeys(fn ($user) => [$user->id_utilisateur => $user->full_name]);

        $contenus = Contenu::where('statut', 'publie')->pluck('titre', 'id_contenu');

        return view('commentaires.edit', compact('commentaire', 'utilisateurs', 'contenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'texte' => 'required|string|max:1000',
            'note' => 'nullable|integer|min:1|max:5',
            'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
            'id_contenu' => 'required|exists:contenus,id_contenu',
            'date' => 'nullable|date',
        ]);

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($validatedData);

        return redirect()->route('commentaires.index')->with('success', 'Commentaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete'); // Apply authorization check

        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé avec succès.');
    }
}
