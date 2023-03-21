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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // la fonction qui return la page de profile et les informations de l'itilisateur connecter
    public function index()
    {
        $user = Auth::user();
        return view('offres.profile', ['profile' => $user]);
    }

    // la fonction de modification des informations de l'itilisateur connecter
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->location = $request->input('location');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/images/' . $filename);
            $image->move(public_path('uploads/images'), $filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->back()->with('success', 'La modification a été avec succès.');
    }

    // la fonction qui modifie le mot de passe de l'utilisateur
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->back()->with('success', 'La modification de mot de passe a été avec succès.');
    }

    // la fonction qui return tout les utilisateurs dans la page user
    public function users(){
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    // la fonction qui return tout les offres dans la page offre
    public function offres(){
        $offres = DB::table('offres')
            ->join('users', 'users.id', '=', 'offres.id_user')
            ->select('offres.id', 'offres.type', 'offres.categorie', 'offres.offre','offres.image_offre','offres.prix','offres.id_user', 'users.nom', 'users.prenom')
            ->get();
        return view('admin.offre',compact('offres'));
    }

    // la fonction pour supprimer un utilisateur de la base de données par l'admine
    public function delete_user($id){
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'L\'utilisateur a été supprimée avec succès.');
    }

    // la fonction pour supprimer une offre de la base de données par l'admine
    public function delete_offre($id){
        Offre::destroy($id);
        return redirect()->back()->with('success', 'L\'offre a été supprimée avec succès.');
    }

    // la fonction de recherche des utilisateurs soit avec le nom ou prenom ou email ou adresse
    public function search_user(Request $request)
    {
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $email = $request->input('email');
        $adresse = $request->input('adresse');
        $query = User::query();
        if ($nom) {
            $query->where('nom', 'LIKE', "%$nom%");
        }
        if ($prenom) {
            $query->where('prenom', 'LIKE', "%$prenom%");
        }
        if ($email) {
            $query->where('email', 'LIKE', "%$email%");
        }
        if ($adresse) {
            $query->where('location', 'LIKE', "%$adresse%");
        }
        $users = $query->get();
        return view('admin.user', compact('users'));
    }
}
