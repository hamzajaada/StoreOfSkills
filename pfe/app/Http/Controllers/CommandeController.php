<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\IsNotServiceOwner;
// controller de commandes
class CommandeController extends Controller
{
    // la fonction de comander une offre s'il est possible
    public function commanderOffre(Request $request) {

        $offre = Offre::findOrFail($request->offre_id);
        if (commande::where('id_user_commande', Auth::id())->where('id_offre', $request->offre_id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà commandé/postulé cette offre');
        }elseif ($request->id_user == Auth::user()->id) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas commander votre propre offre.');
        }else{
            $commande = new Commande;
            $commande->id_user = $request->id_user;
            $commande->id_offre = $request->offre_id;
            $commande->id_user_commande = Auth::user()->id;
            $commande->save();
            return redirect()->back()->with('success', 'Commande enregistrée avec succès');
        }
    }

    // la fonction qui return les commandes retenu par les utilisateur pour accepter ou refuser
    public function commande(){
        $commandes = commande::all()->where('id_user', Auth::user()->id);
        foreach ($commandes as $commande) {
            $offre = Offre::where('id', $commande->id_offre)->first();
            $userdocommande = User::where('id', $commande->id_user_commande)->first();
            $commande->nom = $userdocommande->nom;
            $commande->prenom = $userdocommande->prenom;
            $commande->email = $userdocommande->email;
            $commande->typeOffre = $offre->type;
            $commande->Offre = $offre->offre;
            $commande->prix = $offre->prix;
            $commande->id = $offre->id;
        }
        return view('offres.commande',compact('commandes'));
    }

    // la fonction qui return les les commandes de l'utilisateur et affiche leur status s'il est accepter ou refusé
    public function reponse(){
        $commandes = commande::all()->where('id_user_commande', Auth::user()->id);
        foreach ($commandes as $commande) {
            $offre = Offre::where('id', $commande->id_offre)->first();
            $userdecommande = User::where('id', $commande->id_user)->first();
            $commande->nom = $userdecommande->nom;
            $commande->prenom = $userdecommande->prenom;
            $commande->email = $userdecommande->email;
            $commande->typeOffre = $offre->type;
            $commande->Offre = $offre->offre;
            $commande->prix = $offre->prix;
            $commande->id_commande = $offre->id;
        }
        return view('offres.reponse',['commandes'=>$commandes]);
    }

    // la fonction qui agire lorsque l'utilisateur accept une commande
    public function accepterCommande(Request $request) {
        $commande = commande::where( 'id_offre', $request->commande_id )->first();
        if (!$commande) {
            return redirect()->back()->with('error', 'La commande n\'existe pas');
        }
        $commande->status = 1;
        $commande->save();
        return redirect()->back()->with('success', 'La commande a été accepter');
    }

    // la fonction qui agire lorsque l'utilisateur reffuse une commande
    public function refuserCommande(Request $request) {
        $commande = commande::where( 'id_offre', $request->commande_id )->first();
        if (!$commande) {
            return redirect()->back()->with('error', 'La commande n\'existe pas');
        }
        $commande->status = 2;
        $commande->save();
        $message = "La commande a été refusé avec succès.";
        return redirect()->back()->with('success', 'La commande a été refusé');
    }

    // la fonction qui supprime un commande
    public function delete_commande(Request $request){
        // $commande = commande::where('id',$request->id)->first();
        try {
            $commande = commande::findOrFail($request->id);
            $commande->delete();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'La commande que vous voulez supprimer n\'existe pas.');
        }
        return redirect()->back()->with('success', 'La commande a été supprimée avec succès.');
    }
}
