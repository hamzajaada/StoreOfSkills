<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommandeController extends Controller
{
    public function commanderOffre(Request $request) {
        $validatedData = $request->validate([
            'id' => [
                'required',
                Rule::unique('commandes')->where(function ($query) {
                    return $query->where('id_user_commande', Auth::id());
                })->where(function ($query) use ($request) {
                    return $query->where('id_offre', $request->id);
                })
            ]
        ]);
        if (commande::where('id_user_commande', Auth::id())->where('id_offre', $request->id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà commandé/postulé cette offre');
        }
        $offre = Offre::find($request->id);
        if (optional($offre)->users && $offre->users->contains(auth()->user())) {
            return back()->with('error', 'Vous avez déjà commandé cette offre');
        }
        $commande = new Commande;
        $commande->id_user = $request->id_user;
        $commande->id_offre = $request->id;
        $commande->id_user_commande = Auth::user()->id;
        $commande->save();

        return redirect()->back()->with('success', 'Commande enregistrée avec succès');
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
        $commande = commande::find($request->input('commande_id'));
        $commande->status = 1;
        $commande->save();
        return redirect()->back();
    }

    public function refuserCommande(Request $request, $id) {
        $commande = commande::find($request->input('commande_id'));
        $commande->status = 2;
        $commande->save();
        return redirect()->back();
    }

    public function commande(){
        $commande = [];
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
            $commande->id = $offre->id;
        }
        return view('offres.commande',['commandes'=>$commandes]);
    }
}
