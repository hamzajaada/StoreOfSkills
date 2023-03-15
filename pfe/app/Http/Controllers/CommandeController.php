<?php

namespace App\Http\Controllers;
use App\Models\Offre;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        $offre = Offre::findOrFail($request->offre_id);
        $commandeExistante = Commande::where('user_id', $offre->id_user)->where('buyer_id', auth()->id())->where('offre_id', $offre->id)->exists();
        if ($offre->id_user == auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas commander votre propre offre.');
        } elseif ($commandeExistante) {
            return back()->with('error', 'Vous avez déjà commandé cette offre.');
        } else {
            $commande = new Commande();
            $commande->user_id = $offre->id_user;
            $commande->buyer_id = auth()->id();
            $commande->offre_id = $offre->id;
            $commande->save();
            return back()->with('success', 'Votre commande a été créée avec succès.');
        }
    }

    public function getUserCommandes()
    {
        $userCommandes = Commande::where('user_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.buyer_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->get();

        return view('offres.commande', compact('userCommandes'));
    }

    public function getUserReponses()
    {
        $userReponses = Commande::where('buyer_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.user_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id','commandes.statut', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->get();

        return view('offres.reponse', compact('userReponses'));
    }

    public function update(Request $request)
    {
        $commande = Commande::findOrFail($request->commande_id);

        if ($request->has('accepter')) {
            $commande->statut = 'acceptée';
        } elseif ($request->has('refuser')) {
            $commande->statut = 'refusée';
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue');
        }

        try {
            $commande->save();
            return redirect()->back()->with('success', 'La commande a été mise à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : '.$e->getMessage());
        }
    }

}
