<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function commanderService(Request $request) {
        $offre = Offre::find($request->id);
        if (!$offre) {
            return response()->json(['error' => 'Offre introuvable'], 404);
        }
        $consulter = new Commande;
        $consulter->id_user = $request->id_user;
        $consulter->id_offre = $request->id;
        $consulter->id_user_commande = Auth::user()->id;
        $consulter->save();
        return redirect()->back();
    }
    
    public function commande_id(){
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
        return view('offres.reponse',compact('commandes'));
    }
    public function accepterCommande(Request $request, $id) {
        $commande = Commande::findOrFail($id);
        $commande->status = 1;
        $commande->save();
        return redirect()->back(); 
    }
    
    public function refuserCommande(Request $request, $id) {
        $commande = Commande::findOrFail($id);
        $commande->status = 2;
        $commande->save();
        return redirect()->back();
    }
    
    /*public function commande(){
        $commandes = commande::all()->where('id_user', Auth::user()->id);
        foreach ($commandes as $commande) {
            $offre = Offre::where('id', $commande->id_offre)->first();
            $userdecommande = User::where('id', $commande->id_user)->first();
            $commande->nom = $userdecommande->nom;
            $commande->prenom = $userdecommande->prenom;
            $commande->email = $userdecommande->email;
            $commande->typeOffre = $offre->type;
            $commande->Offre = $offre->offre;
            $commande->prix = $offre->prix;
            $commande->id = $offre->id;
        }
        return view('offres.reponse',compact('commandes'));
    }*/
}
