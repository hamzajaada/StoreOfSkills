<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;

Auth::routes();

Route::get('/', function () { return view('welcome'); })->name('welcome');

Route::get('/home', function () { return view('home'); })->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// le route de type resource de controller offrecontroller
Route::resource('offres',OffreController::class);

// le route de type resource de controller usercontroller
Route::resource('users',UserController::class);

// le route qui return la page des utilisateurs pour l'admine
Route::get('home/users',[UserController::class,'users'])->name('admin.users');

// le route qui return la page d'offres pour l'admine
Route::get('home/offres',[UserController::class,'offres'])->name('users.home.offres');

// le route qui return la page de service
Route::get('home/services',[OffreController::class,'services'])->name('home.services');

// le route qui return la page de demande
Route::get('home/demandes',[OffreController::class,'demandes'])->name('home.demandes');

// le route qui return la page de service personnel
Route::get('home/vos-services',[OffreController::class,'services_id'])->name('home.vosservices');

// le route qui return la page de demande personnel
Route::get('home/vos-demandes',[OffreController::class,'demandes_id'])->name('home.vosdemandes');

// le route qui return la page de reponse
Route::get('home/reponses',[CommandeController::class,'reponse'])->name('home.reponse');

// le route qui return la page de commande
Route::get('home/commandes',[CommandeController::class,'commande'])->name('home.commande');

// les routes qui return la fonction de modification de mot de passe
Route::post('home/profile/change-password',[UserController::class,'changePassword'])->name('users.password');

// le route qui fait l'appel de la fonction qui supprime l'utilisateur
Route::delete('home/users/delete/{id}',[UserController::class,'delete_user'])->name('users.user.delete');

// le route qui fait l'appel de la fonction qui supprime l'offre de la base de données
Route::delete('home/offres/delete/{id}',[UserController::class,'delete_offre'])->name('users.offre.delete');

// le route de recherche d'utilisateurs
Route::post('home/users',[UserController::class,'search_user'])->name('admin.user.search');

// le route de recherche d'offres
Route::post('home/offres',[OffreController::class,'search_offres'])->name('admin.offres.search');

// le route de recherche de services
Route::post('home/services',[OffreController::class,'search_service'])->name('home.services.search');

// le route de recherche de demandes
Route::post('home/demandes',[OffreController::class,'search_demande'])->name('home.demandes.search');

// le route de recherche de services personnel
Route::post('home/vosservices',[OffreController::class,'search_vosservice'])->name('home.vosservices.search');

// le route de recherche de demandes personnel
Route::post('home/vosdemandes',[OffreController::class,'search_vosdemande'])->name('home.vosdemandes.search');

// le route de recherche de commandes
Route::post('home/commander',[CommandeController::class,'commanderOffre'])->name('home.commander');

// le route d'accept de commande
Route::post('/commandes/accepter', [CommandeController::class, 'accepterCommande'])->name('commande.accepter');

// le route de reffus de commande
Route::post('/commandes/refuser', [CommandeController::class, 'refuserCommande'])->name('commande.refuser');
