<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Illuminate\Support\Str;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    /**
     * Affiche la page de confirmation avant le paiement.
     */
    public function show(Contenu $contenu)
    {
        // Le prix est fixe à 1$ (100 centimes)
        $prix = 1.00;

        return view('paiement.show', [
            'contenu' => $contenu,
            'prix' => $prix,
        ]);
    }

    /**
     * Crée une session de paiement Stripe et redirige l'utilisateur.
     */
    public function process(Request $request, Contenu $contenu)
    {
        $user = Auth::user();
        Stripe::setApiKey(config('services.stripe.secret'));

        // Le prix est fixe à 1$ (100 centimes)
        $prixEnCentimes = 100;

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Accès au contenu : ' . $contenu->titre,
                        'description' => Str::limit($contenu->texte, 80),
                    ],
                    'unit_amount' => $prixEnCentimes,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/paiement/succes/{CHECKOUT_SESSION_ID}'),
            'cancel_url' => route('paiement.cancel'),
            'customer_email' => $user->email,
            'metadata' => [
                'user_id' => $user->getKey(), // This will correctly get id_utilisateur if Utilisateur is the auth model
                'contenu_id' => $contenu->getKey(),
            ]
        ]);

        return redirect($checkout_session->url);
    }

    /**
     * Gère le retour après un paiement réussi.
     */
    public function success(string $sessionId)
    {
       Stripe::setApiKey(config('services.stripe.secret'));

        \Log::info('PaiementController@success called. Session ID: ' . $sessionId);

        try {
            $session = Session::retrieve($sessionId);
            \Log::info('Stripe Session retrieved successfully. Session ID: ' . $session->id);
            \Log::info('Stripe Session Metadata: ' . json_encode($session->metadata));


            $userId = $session->metadata['user_id'] ?? null;
            $contenuId = $session->metadata['contenu_id'] ?? null;

            \Log::info('Extracted User ID: ' . $userId . ', Contenu ID: ' . $contenuId);

            // S'assurer que les métadonnées cruciales sont présentes
            if (!$userId || !$contenuId) {
                \Log::error('Missing or invalid payment metadata. User ID: ' . $userId . ', Contenu ID: ' . $contenuId);
                throw new \Exception("Métadonnées de paiement manquantes ou invalides.");
            }

            // Check if a payment record already exists to prevent duplicates
            $existingPayment = Paiement::where('user_id', $userId)
                                       ->where('contenu_id', $contenuId)
                                       ->where('statut_paiement', 'reussi')
                                       ->first();

            if ($existingPayment) {
                \Log::info('Payment record already exists for User ID: ' . $userId . ', Contenu ID: ' . $contenuId);
                // Redirect directly to content if already paid
                return redirect()->route('contenus.show', $contenuId)
                    ->with('info', 'Vous avez déjà accès à ce contenu.');
            }


            try {
                \Log::info('Attempting to create Paiement record...');
                Paiement::create([
                    'user_id' => $userId,
                    'contenu_id' => $contenuId,
                    'montant' => $session->amount_total / 100,
                    'reference_paiement' => $session->id,
                    'statut_paiement' => 'reussi',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                \Log::info('Paiement record created successfully for User ID: ' . $userId . ', Contenu ID: ' . $contenuId);

            } catch (\Exception $e) { // Changed to generic \Exception to catch all
                \Log::error('Failed to insert payment record: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());

                return redirect()->route('accueil')
                    ->with('error', 'A database error occurred while confirming the payment.');
            }

            // Redirect to the purchased content page
            return redirect()->route('contenus.show', $contenuId)
                ->with('success', 'Paiement réussi ! Vous avez maintenant accès au contenu.');

        } catch (\Exception $e) {
            \Log::error('Exception in PaiementController@success: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            // Gérer l'erreur (par exemple, si la session n'est pas trouvée)
            return redirect()->route('accueil')
                ->with('error', 'Une erreur est survenue lors de la confirmation du paiement.');
        }
    }

    /**
     * Gère l'annulation du paiement.
     */
    public function cancel()
    {
        return redirect()->route('accueil')
            ->with('info', 'Le processus de paiement a été annulé.');
    }
}
