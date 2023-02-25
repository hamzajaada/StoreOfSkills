<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $compte = User::where('id', Auth::user()->id)->get();
        return view('home',compact('compte'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offres.ajouteOffre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->storeAs(
            'offres', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
        );

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
    public function edit($id)
    {
        $offre = Offre::findorFail($id);
        return view('offres.modification_offre',compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
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
        $offre->id_user = $request->user_id;
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
    public function destroy($id)
    {
        $data = Offre::where('id',$id);
        $data->delete();
        return redirect()->route('home');
    }



    public function services(){
        $services = Offre::where('type','service')->get();
        foreach ($services as $srv) {
            $user = User::where('id', $srv->id_user)->first(); // récupère l'utilisateur correspondant à l'id_user de l'srv
            $srv->nom = $user->nom; // ajoute le nom de l'utilisateur à l'srv
            $srv->prenom = $user->prenom; // ajoute le prénom de l'utilisateur à l'srv
            $srv->image = $user->image; // ajoute l'image de l'utilisateur à l'srv
        }
        return view('offres.services',compact('services'));
    }

    public function demandes(){
        $demandes = Offre::where('type','demande')->get();
        foreach ($demandes as $d) {
            $user = User::where('id', $d->id_user)->first(); // récupère l'utilisateur correspondant à l'id_user de l'd
            $d->nom = $user->nom; // ajoute le nom de l'utilisateur à l'd
            $d->prenom = $user->prenom; // ajoute le prénom de l'utilisateur à l'd
            $d->image = $user->image; // ajoute l'image de l'utilisateur à l'd
        }
        return view('offres.demandes',compact('demandes'));
    }

    public function services_id(){
        $services = Offre::all()->where('type','service')->where('id_user', Auth::user()->id);
        foreach ($services as $srv) {
            $user = User::where('id', $srv->id_user)->first(); // récupère l'utilisateur correspondant à l'id_user de l'srv
            $srv->nom = $user->nom; // ajoute le nom de l'utilisateur à l'srv
            $srv->prenom = $user->prenom; // ajoute le prénom de l'utilisateur à l'srv
            $srv->image = $user->image; // ajoute l'image de l'utilisateur à l'srv
        }
        return view('offres.vosservice',compact('services'));
    }

    public function demandes_id(){
        $demandes = Offre::all()->where('type','demande')->where('id_user', Auth::user()->id);
        foreach ($demandes as $d) {
            $user = User::where('id', $d->id_user)->first(); // récupère l'utilisateur correspondant à l'id_user de l'd
            $d->nom = $user->nom; // ajoute le nom de l'utilisateur à l'd
            $d->prenom = $user->prenom; // ajoute le prénom de l'utilisateur à l'd
            $d->image = $user->image; // ajoute l'image de l'utilisateur à l'd
        }
        return view('offres.vosdemandes',compact('demandes'));
    }

    public function repondres($id){

    }
}
