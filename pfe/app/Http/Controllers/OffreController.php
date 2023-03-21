<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// le controller des offres
class OffreController extends Controller
{
    // la fonction qui return la page home
    public function index()
    {
        return view('home');
    }

    // la fonction qui return la page de crée un offre
    public function create()
    {
        return view('offres.ajouteOffre');
    }

    //  la fonction qui ajoute l'offre à la base données
    public function store(Request $request)
    {
        // la validation des information
        $request->validate([
            'image' => 'required|image'
        ]);
        // l'ajoute de photo au dossier offres
        $imagePath = $request->file('image')->storeAs(
            'offres', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
        );
        // l'ajoute d'offre au base de données
        $offre = new Offre();
        $offre->type = $request->type;
        $offre->categorie = $request->categorie;
        $offre->offre = $request->offre;
        $offre->image_offre = $imagePath;
        $offre->prix = $request->prix;
        $offre->id_user = $request->id_user;
        $offre->save();
        if($request->type=='service'){
            return redirect()->route('home.services')->with('success', 'Votre service a été créée avec succès.');
        }elseif($request->type=='demande'){
            return redirect()->route('home.demandes')->with('success', 'Votre demande a été créée avec succès.');
        }
    }

    // return les offres en détail
    public function show($id)
    {
        $offre = Offre::findorFail($id);
        return view('admin.detail',compact('offre'));
    }

    // la fonction qui return les information d'offre précis pour les modifier
    public function edit($id)
    {
        $offre = Offre::findorFail($id);
        return view('offres.modification_offre',compact('offre'));
    }

    // la fonction pour modifier une offre précis et souvegarder à la base de données
    public function update(Request $request, $id)
    {
        $offre = Offre::findorFail($id);
        $offre->type = $request->type;
        $offre->categorie = $request->categorie;
        $offre->offre = $request->offre;
        if($request->file('image') != null){
            $imagePath = $request->file('image')->storeAs(
                'offres', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
            );
            $offre->image_offre = $imagePath;
        }
        $offre->prix = $request->prix;
        $offre->id_user = $request->id_user;
        $offre->save();
        if($request->type=='service'){
            return redirect()->route('home.vosservices')->with('success', 'Votre service a été modifier avec succès.');;
        }elseif($request->type=='demande'){
            return redirect()->route('home.vosdemandes')->with('success', 'Votre demande a été modifier avec succès.');;
        }
    }

    // la fonction pour supprimer un offre de la base données
    public function destroy($id)
    {
        $offre = Offre::findorFail($id);
        $offre->delete();
        return redirect()->back()->with('success', 'Votre offre a été supprimer avec succès.');
    }

    // la fonction qui return les offres de type service
    public function services(){
        $services = DB::table('offres')->where('offres.type','service')
            ->join('users', 'users.id', '=', 'offres.id_user')
            ->select('offres.id', 'offres.type', 'offres.categorie', 'offres.offre','offres.image_offre','offres.prix','offres.id_user', 'users.nom', 'users.prenom', 'users.location','users.image')
            ->get();
        return view('offres.services',compact('services'));
    }

    // la fonction qui return les offres de type demande
    public function demandes(){
        $demandes =DB::table('offres')->where('offres.type','demande')
            ->join('users', 'users.id', '=', 'offres.id_user')
            ->select('offres.id', 'offres.type', 'offres.categorie', 'offres.offre','offres.image_offre','offres.prix','offres.id_user', 'users.nom', 'users.prenom', 'users.location','users.image')
            ->get();
        return view('offres.demandes',compact('demandes'));
    }

    // la fonction qui return les offres de type service de l'utilisateur connecter
    public function services_id(){
        $services = DB::table('offres')->where('offres.type','service')
            ->where('id_user', Auth::user()->id)
            ->join('users', 'users.id', '=', 'offres.id_user')
            ->select('offres.id', 'offres.type', 'offres.categorie', 'offres.offre','offres.image_offre','offres.prix','offres.id_user', 'users.nom', 'users.prenom', 'users.location','users.image')
            ->get();
        return view('offres.vosservice',compact('services'));
    }

    // la fonction qui return les offres de type demande de l'utilisateur connecter
    public function demandes_id(){
        $demandes = DB::table('offres')->where('offres.type','demande')
            ->where('id_user', Auth::user()->id)
            ->join('users', 'users.id', '=', 'offres.id_user')
            ->select('offres.id', 'offres.type', 'offres.categorie', 'offres.offre','offres.image_offre','offres.prix','offres.id_user', 'users.nom', 'users.prenom', 'users.location','users.image')
            ->get();
        return view('offres.vosdemandes',compact('demandes'));
    }

    // la fonction de recherche d'offre soit avec le nom ou prenom ou type ou catégorie
    public function search_offres(Request $request)
    {
        $offres = DB::table('users')
            ->join('offres', 'users.id', '=', 'offres.id_user')
            ->select('users.nom', 'users.prenom','offres.id', 'offres.type', 'offres.categorie', 'offres.offre', 'offres.prix')
            ->where('users.nom', 'LIKE', '%'.$request->input('nom').'%')
            ->where('users.prenom', 'LIKE', '%'.$request->input('prenom').'%')
            ->where('offres.type', 'LIKE', '%'.$request->input('type').'%')
            ->where('offres.categorie', 'LIKE', '%'.$request->input('categorie').'%')
            ->get();
        return view('admin.offre', compact('offres'));
    }

    // la fonction de recherche de service soit avec le nom ou prenom ou catégorie
    public function search_service(Request $request)
    {
        $services = DB::table('users')
            ->join('offres', 'users.id', '=', 'offres.id_user')
            ->select('users.nom', 'users.prenom','users.location','users.image','offres.id','offres.type','offres.offre', 'offres.prix','offres.image_offre','offres.id_user')
            ->where('users.nom', 'LIKE', '%'.$request->input('nom').'%')
            ->where('users.prenom', 'LIKE', '%'.$request->input('prenom').'%')
            ->where('users.location', 'LIKE', '%'.$request->input('location').'%')
            ->where('offres.categorie', 'LIKE', '%'.$request->input('categorie').'%')
            ->where('offres.type','service')
            ->get();
        return view('offres.services',compact('services'));
    }

    // la fonction de recherche de demande soit avec le nom ou prenom ou catégorie
    public function search_demande(Request $request)
    {
        $demandes = DB::table('users')
            ->join('offres', 'users.id', '=', 'offres.id_user')
            ->select('users.nom', 'users.prenom','users.location','users.image','offres.id','offres.type','offres.offre', 'offres.prix','offres.image_offre','offres.id_user')
            ->where('users.nom', 'LIKE', '%'.$request->input('nom').'%')
            ->where('users.prenom', 'LIKE', '%'.$request->input('prenom').'%')
            ->where('users.location', 'LIKE', '%'.$request->input('location').'%')
            ->where('offres.categorie', 'LIKE', '%'.$request->input('categorie').'%')
            ->where('offres.type','demande')
            ->get();
        return view('offres.demandes',compact('demandes'));
    }

    // la fonction de recherche de service soit avec le nom ou prenom ou catégorie de l'utilisateur connecter
    public function search_vosservice(Request $request)
    {
        $services = DB::table('users')
            ->join('offres', 'users.id', '=', 'offres.id_user')
            ->select('users.nom', 'users.prenom','users.image','offres.id','offres.type','offres.offre', 'offres.prix','offres.image_offre','offres.id_user')
            ->where('offres.categorie', 'LIKE', '%'.$request->input('categorie').'%')
            ->where('offres.type','service')
            ->where('id_user', Auth::user()->id)
            ->get();
        return view('offres.vosservice',compact('services'));
    }

    // la fonction de recherche de demande soit avec le nom ou prenom ou catégorie de l'utilisateur connecter
    public function search_vosdemande(Request $request)
    {
        $demandes = DB::table('users')
            ->join('offres', 'users.id', '=', 'offres.id_user')
            ->select('users.nom', 'users.prenom','users.image','offres.id','offres.type','offres.offre', 'offres.prix','offres.image_offre','offres.id_user')
            ->where('offres.categorie', 'LIKE', '%'.$request->input('categorie').'%')
            ->where('offres.type','demande')
            ->where('id_user', Auth::user()->id)
            ->get();
        return view('offres.vosdemandes',compact('demandes'));
    }
}
