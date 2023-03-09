<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// le controller home
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // la fonction qui return la page home
    public function index()
    {
        return view('home');

    }
}
