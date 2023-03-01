<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\Offre;
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
}
