<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
// verification de data entrer par l'utilisateur
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required', 'image', 'max:2048'],
        ]);
    }
// return l'objet user
    protected function create(array $data)
    {
        $image = $data['image'];
        $imagePath = $image->storeAs('users', time() . '_' . $image->getClientOriginalName(), 'images');
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'location' => $data['location'],
            'email' => $data['email'],
            'image' => $imagePath,
            'password' => Hash::make($data['password']),
        ]);
    }
}
