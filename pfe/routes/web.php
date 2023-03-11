<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::resource('offres',OffreController::class);
Route::resource('users',UserController::class);
Route::post('home/profile/change-password',[UserController::class,'changePassword'])->name('users.password');
Route::get('home/users',[UserController::class,'users'])->name('admin.users');
Route::get('home/offres',[UserController::class,'offres'])->name('users.home.offres');
Route::delete('home/users/delete/{id}',[UserController::class,'delete_user'])->name('users.user.delete');
Route::delete('home/offres/delete/{id}',[UserController::class,'delete_offre'])->name('users.offre.delete');
Route::get('home/services',[OffreController::class,'services'])->name('home.services');
Route::get('home/demandes',[OffreController::class,'demandes'])->name('home.demandes');
Route::get('home/vos-services',[OffreController::class,'services_id'])->name('home.vosservices');
Route::get('home/vos-demandes',[OffreController::class,'demandes_id'])->name('home.vosdemandes');
Route::post('home/commander',[CommandeController::class,'commanderOffre'])->name('home.commander');

Route::post('home/users/search',[UserController::class,'search_user'])->name('admin.user.search');
Route::post('home/offres/search',[OffreController::class,'search_offres'])->name('admin.offres.search');
Route::post('home/services/search',[OffreController::class,'search_service'])->name('home.services.search');
Route::post('home/demandes/search',[OffreController::class,'search_demande'])->name('home.demandes.search');
Route::post('home/vosservices/search',[OffreController::class,'search_vosservice'])->name('home.vosservices.search');
Route::post('home/vosdemandes/search',[OffreController::class,'search_vosdemande'])->name('home.vosdemandes.search');

Route::get('home/reponses',[CommandeController::class,'reponse'])->name('home.reponse');
Route::get('home/commandes',[CommandeController::class,'commande'])->name('home.commande');
Route::post('/commandes/accepter', [CommandeController::class, 'accepterCommande'])->name('commande.accepter');
Route::post('/commandes/refuser', [CommandeController::class, 'refuserCommande'])->name('commande.refuser');
// Route::post('/commandes/début', [CommandeController::class, 'startCommande'])->name('commande.start');
// Route::post('/commandes/terminé', [CommandeController::class, 'terminerCommande'])->name('commande.terminer');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
