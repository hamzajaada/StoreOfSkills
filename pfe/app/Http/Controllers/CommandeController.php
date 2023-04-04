<?php

namespace App\Http\Controllers;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\Commande;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    // la fonction qui enregistre une commande s'il est correct
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

    // la fonction qui return les commande pour l'accepter ou refuser
    public function getUserCommandes()
    {
        $userCommandes = Commande::where('user_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.buyer_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id','commandes.statut', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->get();
        return view('offres.commande', compact('userCommandes'));
    }

    // la fonction de recherche dans la page de commande
    public function search_commande(Request $request)
    {
        $userCommandes = DB::table('commandes')->where('user_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.buyer_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id','commandes.statut', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->where('users.nom', 'LIKE', '%'.$request->input('nom').'%')
            ->where('users.prenom', 'LIKE', '%'.$request->input('prenom').'%')
            ->where('users.email', 'LIKE', '%'.$request->input('email').'%')
            ->where('offres.type', 'LIKE', '%'.$request->input('type').'%')
            ->where('commandes.statut', 'LIKE', '%'.$request->input('statut').'%')
            ->get();
        return view('offres.commande', compact('userCommandes'));
    }

    // la fonction qui return les commande que l'utilisateur a commander pour voir leur situation ou le supprimer
    public function getUserReponses()
    {
        $userReponses = Commande::where('buyer_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.user_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id','commandes.statut', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->get();
        return view('offres.reponse', compact('userReponses'));
    }

    // la fonction de recherche dans la page de reponse
    function search_reponse(Request $request){
        $userReponses = DB::table('commandes')->where('buyer_id', auth()->id())
            ->join('users', 'users.id', '=', 'commandes.user_id')
            ->join('offres', 'offres.id', '=', 'commandes.offre_id')
            ->select('commandes.id', 'commandes.user_id', 'commandes.buyer_id', 'commandes.offre_id','commandes.statut', 'users.nom', 'users.prenom', 'users.email', 'offres.type', 'offres.offre', 'offres.prix')
            ->where('users.nom', 'LIKE', '%'.$request->input('nom').'%')
            ->where('users.prenom', 'LIKE', '%'.$request->input('prenom').'%')
            ->where('users.email', 'LIKE', '%'.$request->input('email').'%')
            ->where('offres.type', 'LIKE', '%'.$request->input('type').'%')
            ->where('commandes.statut', 'LIKE', '%'.$request->input('statut').'%')
            ->get();
        return view('offres.reponse', compact('userReponses'));
        }

    // la fonction qui fait la modification dans le status de commande
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

    // la fonction qui supprime la commande
    function destroy($id){
        Commande::where('id',$id)->delete();
        return redirect()->back()->with('success','La commande a été supprimée avec succès');
    }

}
