<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\TypeContenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\Paiement;
use App\Models\Utilisateur; // Import the Utilisateur model
use Illuminate\Support\Facades\Auth;

class PublicContenuController extends Controller
{
    public function __construct()
    {
        // The 'show' method should not require authentication if we want to show a login prompt.
        // The middleware will be handled by the view logic.
    }

    public function index(Request $request)
    {
        $query = Contenu::where('statut', 'publié')
            ->with(['typeContenu', 'region', 'langue', 'auteur'])
            ->orderBy('created_at', 'desc');

        if ($request->type) {
            $query->where('id_type_contenu', $request->type);
        }

        if ($request->region) {
            $query->where('id_region', $request->region);
        }

        if ($request->langue) {
            $query->where('id_langue', $request->langue);
        }

        $contenus = $query->paginate(12);
        $types = TypeContenu::all();
        $regions = Region::all();
        $langues = Langue::all();

        $purchasedContenuIds = [];
        if (Auth::check()) {
            $purchasedContenuIds = Paiement::where('user_id', Auth::id())
                ->where('statut_paiement', 'reussi')
                ->pluck('contenu_id')
                ->toArray();
        }

        return view('contenu.index', compact('contenus', 'types', 'regions', 'langues', 'purchasedContenuIds'));
    }

    public function show($id)
    {
        $contenu = Contenu::with([
            'typeContenu',
            'region',
            'langue',
            'auteur' => function($query) {
                $query->withCount('contenus');
            }
        ])->findOrFail($id);

        $hasAccess = false;
        $user = Auth::user(); // This will return an instance of the configured User model (likely Utilisateur)

        if ($user) {
            // User is the author
            if ($user->id_utilisateur == $contenu->id_auteur) { // Use id_utilisateur for Utilisateur model
                $hasAccess = true;
            }
            // User has a successful payment
            else {
                $hasAccess = Paiement::where('user_id', $user->id_utilisateur) // Use id_utilisateur for Utilisateur model
                    ->where('contenu_id', $contenu->id_contenu)
                    ->where('statut_paiement', 'reussi')
                    ->exists();
            }
        }

        return view('contenu.show', compact('contenu', 'hasAccess'));
    }
}
