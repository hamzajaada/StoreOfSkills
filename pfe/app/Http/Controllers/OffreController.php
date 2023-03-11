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
    /**
     * Display a listing of the resource.
     */
    // la fonction qui return la page home
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    // la fonction qui return la page de crée un offre
    public function create()
    {
        return view('offres.ajouteOffre');
    }

    /**
     * Store a newly created resource in storage.
     */

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
            return redirect()->route('home.services');
        }elseif($request->type=='demande'){
            return redirect()->route('home.demandes');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // la fonction qui return les information d'offre précis pour les modifier
    public function edit($id)
    {
        $offre = Offre::findorFail($id);
        return view('offres.modification_offre',compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            return redirect()->route('home.vosservices');
        }elseif($request->type=='demande'){
            return redirect()->route('home.vosdemandes');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    // la fonction pour supprimer un offre de la base données
    public function destroy($id)
    {
        $offre = Offre::findorFail($id);
        $offre->delete();
        return redirect()->back();
    }

    // la fonction qui return les offres de type service
    public function services(){
        $services = Offre::where('type','service')->get();
        foreach ($services as $srv) {
            $user = User::where('id', $srv->id_user)->first();
            $srv->nom = $user->nom;
            $srv->prenom = $user->prenom;
            $srv->location = $user->location;
            $srv->image = $user->image;
        }
        return view('offres.services',compact('services'));
    }

    // la fonction qui return les offres de type demande
    public function demandes(){
        $demandes = Offre::where('type','demande')->get();
        foreach ($demandes as $d) {
            $user = User::where('id', $d->id_user)->first();
            $d->nom = $user->nom;
            $d->prenom = $user->prenom;
            $d->location = $user->location;
            $d->image = $user->image;
        }
        return view('offres.demandes',compact('demandes'));
    }

    // la fonction qui return les offres de type service de l'utilisateur connecter
    public function services_id(){
        $services = Offre::all()->where('type','service')->where('id_user', Auth::user()->id);
        foreach ($services as $srv) {
            $user = User::where('id', $srv->id_user)->first();
            $srv->nom = $user->nom;
            $srv->prenom = $user->prenom;
            $srv->location = $user->location;
            $srv->image = $user->image;
        }
        return view('offres.vosservice',compact('services'));
    }

    // la fonction qui return les offres de type demande de l'utilisateur connecter
    public function demandes_id(){
        $demandes = Offre::all()->where('type','demande')->where('id_user', Auth::user()->id);
        foreach ($demandes as $d) {
            $user = User::where('id', $d->id_user)->first();
            $d->nom = $user->nom;
            $d->prenom = $user->prenom;
            $d->location = $user->location;
            $d->image = $user->image;
        }
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
