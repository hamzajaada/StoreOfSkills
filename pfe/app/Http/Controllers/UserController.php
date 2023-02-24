<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function index(){
    //     $profile = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->first();
    //     return view('offres.profile',compact('profile'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $user = User::findorFail($id);
    //     $user->nom = $request->nom;
    //     $user->prenom = $request->prenom;
    //     $user->email = $request->email;
    //     $user->location = $request->location;
    //     if($request->file('image') != null){
    //         $imagePath = $request->file('image')->storeAs(
    //             'users', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
    //         );
    //         $user->image = $imagePath;
    //     }
    //     $user->save();
    //
    // }

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

    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
    //         'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()->differentFrom($request->current_password)],
    //         'password_confirmation' => 'required|same:password',
    //     ]);

    //     $user = Auth::user();
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     return redirect()->back()->with('success', 'Votre mot de passe a été modifié avec succès.');
    // }

    public function profile(){

    }

    public function destroy($id)
    {
        //
    }
}
