<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// le controller home
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // la fonction qui return la page home
    public function index()
    {
        return view('home');

    }
}
