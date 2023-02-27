<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
}
