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
    public function index()
    {
        $user = Auth::user();
        return view('offres.profile', ['profile' => $user]);
    }

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
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->back();
    }

    public function users(){
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    public function offres(){
        $offres = Offre::all();
        foreach ($offres as $f) {
            $user = User::where('id', $f->id_user)->first();
            $f->nom = $user->nom;
            $f->prenom = $user->prenom;
        }
        return view('admin.offre',compact('offres'));
    }

    public function delete_user($id){
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function delete_offre($id){
        Offre::destroy($id);
        return redirect()->back();
    }

    public function profile(){

    }

    public function destroy($id)
    {
        //
    }



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
            $query->where('adresse', 'LIKE', "%$adresse%");
        }

        $users = $query->get();
        return view('admin.user', compact('users'));

    }

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

    // public function search_offres(Request $request)
    // {

    //     $nom = $request->input('nom');
    //     $prenom = $request->input('prenom');
    //     $type = $request->input('type');
    //     $categorie = $request->input('categorie');
    //     $query = Offre::with('user');

    //     if ($nom) {
    //         $query->whereHas('user', function ($q) use ($nom) {
    //             $q->where('nom', 'LIKE', "%$nom%");
    //         });
    //     }
    //     if ($prenom) {
    //         $query->whereHas('user', function ($q) use ($prenom) {
    //             $q->where('prenom', 'LIKE', "%$prenom%");
    //         });
    //     }
    //     if ($type) {
    //         $query->where('type', 'LIKE', "%$type%");
    //     }
    //     if ($categorie) {
    //         $query->where('categorie', 'LIKE', "%$categorie%");
    //     }

    //     $offres = $query->get();


    //     $offres = $query->get();
    //     return view('admin.offre', compact('offres'));

    // }







}
