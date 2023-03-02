<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Consulter;
class ConsulterController extends Controller
{
    

     public function commanderService($idOffre, $idClient) {
        // Vérifier si l'offre existe
       $offre = Offre::find($idOffre);
         if (!$offre) {
             return response()->json(['error' => 'Offre introuvable'], 404);
         }

         // Ajouter la commande dans le tableau "consulter"
         $consulter = new Consulter;
         $consulter->id_User = $idClient;
         $consulter->id_offre = $idOffre;
         $consulter->save();
    //     // Retourner la réponse
     return response()->json(['success' => 'Commande ajoutée avec succès'], 200);
     }

}
