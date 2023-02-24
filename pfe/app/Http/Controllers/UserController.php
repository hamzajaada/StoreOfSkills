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
    public function index(){
        $profile = User::where('nom', Auth::user()->nom)->where('prenom',Auth::user()->prenom)->first();
        return view('offres.profile',compact('profile'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        return $request;
        // $user->nom = $request->nom;
        // $user->prenom = $request->prenom;
        // $user->email = $request->email;
        // $user->location = $request->location;
        // if($request->file('image') != null){
        //     $imagePath = $request->file('image')->storeAs(
        //         'users', time() . '_' . $request->file('image')->getClientOriginalName(), 'images'
        //     );
        //     $user->image = $imagePath;
        // }
        // $user->save();
        // return redirect()->route('home.profile');
    }

    public function profile(){

    }

    public function destroy($id)
    {
        //
    }
}
