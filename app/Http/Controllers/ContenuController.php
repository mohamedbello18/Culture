<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\User;
use App\Models\Region;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate; // Import Gate facade

class ContenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenus = Contenu::with(['typeContenu', 'auteur', 'langue'])
                            ->orderBy('id_contenu', 'desc')
                            ->paginate(10);

        $statuts = $this->getStatutOptions();

        return view('contenus.index', compact('contenus', 'statuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeContenu::orderBy('nom')->pluck('nom', 'id_type');
        // Use full_name accessor for better display
        $auteurs = User::where('statut', 'actif')
                       ->get()
                       ->mapWithKeys(fn ($user) => [$user->id_utilisateur => $user->full_name]);
        $regions = Region::orderBy('nom_region')->pluck('nom_region', 'id_region');
        $langues = Langue::orderBy('nom_langue')->pluck('nom_langue', 'id_langue');
        $statuts = $this->getStatutOptions();

        $parents = Contenu::where('statut', 'publie')->pluck('titre', 'id_contenu');

        return view('contenus.create', compact('types', 'auteurs', 'regions', 'langues', 'statuts', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules());

        $validatedData['date_creation'] = $validatedData['date_creation'] ?? now();
        $validatedData['statut'] = $validatedData['statut'] ?? 'brouillon';

        if ($validatedData['statut'] === 'publie' && !$request->filled('date_validation')) {
            $validatedData['date_validation'] = now();
        }

        Contenu::create($validatedData);

        return redirect()->route('contenus.index')->with('success', 'Contenu créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contenu = Contenu::with(['typeContenu', 'auteur', 'region', 'langue', 'moderateur', 'parent', 'enfants'])
                          ->findOrFail($id);

        $statuts = $this->getStatutOptions();

        return view('contenus.show', compact('contenu', 'statuts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contenu = Contenu::findOrFail($id);

        $types = TypeContenu::orderBy('nom')->pluck('nom', 'id_type');
        // Use full_name accessor for better display
        $auteurs = User::where('statut', 'actif')
                       ->get()
                       ->mapWithKeys(fn ($user) => [$user->id_utilisateur => $user->full_name]);
        $regions = Region::orderBy('nom_region')->pluck('nom_region', 'id_region');
        $langues = Langue::orderBy('nom_langue')->pluck('nom_langue', 'id_langue');
        $statuts = $this->getStatutOptions();

        $parents = Contenu::where('statut', 'publie')
                            ->where('id_contenu', '!=', $id)
                            ->pluck('titre', 'id_contenu');

        return view('contenus.edit', compact('contenu', 'types', 'auteurs', 'regions', 'langues', 'statuts', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate($this->validationRules($id));
        $contenu = Contenu::findOrFail($id);

        if ($validatedData['statut'] === 'publie' && empty($contenu->date_validation)) {
             $validatedData['date_validation'] = now();
        }

        if ($validatedData['statut'] !== 'publie') {
             $validatedData['date_validation'] = null;
        }

        $contenu->update($validatedData);

        return redirect()->route('contenus.index')->with('success', 'Contenu mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete'); // Apply authorization check

        $contenu = Contenu::findOrFail($id);
        $contenu->delete();

        return redirect()->route('contenus.index')->with('success', 'Contenu supprimé avec succès.');
    }

    // --- Fonctions utilitaires ---

    protected function getStatutOptions()
    {
        return [
            'brouillon' => ['label' => 'Brouillon', 'badge' => 'bg-secondary'],
            'en_attente' => ['label' => 'En Attente', 'badge' => 'bg-warning text-dark'],
            'publie' => ['label' => 'Publié', 'badge' => 'bg-success'],
            'rejete' => ['label' => 'Rejeté', 'badge' => 'bg-danger'],
        ];
    }

    protected function validationRules($id = null)
    {
        return [
            'titre' => 'required|string|max:255',
            'id_type_contenu' => 'required|exists:type_contenus,id_type',
            'id_auteur' => 'required|exists:utilisateurs,id_utilisateur',
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue',
            'id_parent' => 'nullable|exists:contenus,id_contenu',
            'id_moderateur' => 'nullable|exists:utilisateurs,id_utilisateur',
            'texte' => 'required|string',
            'date_creation' => 'nullable|date',
            'statut' => ['required', Rule::in(array_keys($this->getStatutOptions()))],
            'date_validation' => 'nullable|date',
        ];
    }
}
