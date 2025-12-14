<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\TypeMedia;
use App\Models\Paiement; // Import Paiement model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicMediaController extends Controller
{
    public function __construct()
    {
        // 'download' requires authentication for premium media
        $this->middleware('auth')->only(['download']);
    }

    public function index(Request $request)
    {
        $query = Media::with('typeMedia', 'user')
            ->orderBy('created_at', 'desc');

        if ($request->type) {
            $query->where('id_type_media', $request->type);
        }

        if ($request->search) {
            $query->where('description', 'like', '%' . $request->search . '%')
                  ->orWhere('Chemin', 'like', '%' . $request->search . '%');
        }

        $medias = $query->paginate(20);
        $types = TypeMedia::all();

        return view('media.index', compact('medias', 'types'));
    }

    public function show($id)
    {
        $media = Media::with('typeMedia', 'user')
            ->findOrFail($id);

        // Retrieve similar medias
        $similarMedias = Media::with('typeMedia')
            ->where('id_type_media', $media->id_type_media)
            ->where('id_media', '!=', $media->id_media)
            ->where(function($query) use ($media) {
                $query->where('description', 'like', '%' . $media->description . '%')
                    ->orWhere('description', 'like', '%' . substr($media->description, 0, 20) . '%');
            })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        if ($similarMedias->count() < 3) {
            $additionalMedias = Media::with('typeMedia')
                ->where('id_type_media', $media->id_type_media)
                ->where('id_media', '!=', $media->id_media)
                ->whereNotIn('id_media', $similarMedias->pluck('id_media'))
                ->inRandomOrder()
                ->limit(4 - $similarMedias->count())
                ->get();

            $similarMedias = $similarMedias->merge($additionalMedias);
        }

        return view('media.show', compact('media', 'similarMedias'));
    }

    // Removed initiatePayment as media payment is tied to content payment

    public function download($id)
    {
        $media = Media::where('id_media', $id)
                    ->where('is_valide', true)
                    ->firstOrFail();

        $user = auth()->user();

        // If media is premium, check access based on content payment
        if ($media->is_premium) {
            if (!$user) {
                return redirect()->route('login')->with('error', 'Vous devez être connecté pour télécharger ce média premium.');
            }

            // 1. Check if user is the author of the media
            if ($user->id_utilisateur == $media->id_utilisateur) {
                // Author has access
            }
            // 2. Check if the media is linked to a content AND if the user has paid for that content
            else if ($media->id_contenu) {
                $hasPaidForContent = Paiement::where('user_id', $user->id_utilisateur)
                    ->where('contenu_id', $media->id_contenu)
                    ->where('statut_paiement', 'reussi')
                    ->exists();

                if (!$hasPaidForContent) {
                    return back()->with('error', 'Vous devez acheter le contenu associé pour télécharger ce média premium.');
                }
            }
            // 3. If premium media is not linked to content and user is not author, deny access
            else {
                return back()->with('error', 'Accès non autorisé à ce média premium.');
            }
        }

        // Check if file exists
        $path = 'public/' . $media->Chemin;
        if (!Storage::exists($path)) {
            return back()->with('error', 'Le fichier n\'existe plus sur le serveur.');
        }

        // Increment download counter
        $media->increment('downloads');

        // Download the file
        return Storage::download($path, $media->nom_fichier ?? basename($media->Chemin));
    }
}
