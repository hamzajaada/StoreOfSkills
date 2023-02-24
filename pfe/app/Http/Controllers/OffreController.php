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
        $compte = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->get();
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
            'nom' => 'required',
            'prenom' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->storeAs(
            'offres', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
        );

        $offre = new Offre();
        $offre->nom = $request->nom;
        $offre->prenom = $request->prenom;
        $offre->type = $request->type;
        $offre->categorie = $request->categorie;
        $offre->offre = $request->offre;
        $offre->image_offre = $imagePath;
        $offre->prix = $request->prix;
        $offre->save();
        // Offre::create([
        //     'nom'=>$request->nom,
        //     'prenom'=>$request->prenom,
        //     'type' =>$request->type,
        //     'categorie' =>$request->categorie,
        //     'offre' =>$request->offre,
        //     'image_offre'=>$imagePath,
        //     'prix'=>$request->prix
        // ]);
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
    public function edit(Offre $offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        //
    }

    public function profile(){
        $profile = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->first();
        return view('offres.profile',compact('profile'));
    }

    public function services(){
        $services = Offre::where('type','service')->get();
        return view('offres.services',compact('services'));
    }

    public function demandes(){
        $demandes = Offre::where('type','demande')->get();
        return view('offres.demandes',compact('demandes'));
    }

    public function services_id(){
        $id = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->first();
        $compte = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom);
        $services = Offre::all()->where('type','service')->where('id',$id);
        return view('offres.vosservice',compact('services','compte'));
    }

    public function demandes_id(){
        $id = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->first();
        $compte = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom);
        $demandes = Offre::all()->where('type','demande')->where('id',$id);
        return view('offres.vosdemandes',compact('demandes','compte'));
    }

    public function repondres($id){

    }
}
