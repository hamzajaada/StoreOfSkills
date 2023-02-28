<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function commanderOffre(Request $request, $idOffre) {
        // Récupérer l'utilisateur qui passe la commande
        $utilisateur = Auth::user();

        // Récupérer l'offre correspondante
        $offre = Offre::findOrFail($idOffre);

        // Créer une nouvelle commande
        $commande = new Commande();
        $commande->id_offre = $idOffre;
        $commande->id_user = $utilisateur->id;
        $commande->nom = $request->input('nom');
        $commande->adresse = $request->input('adresse');
        $commande->statut = 'en attente';
        $commande->save();

        // Afficher un message de confirmation
        return redirect()->back()->with('success', 'Commande passée avec succès.');
    }
}
