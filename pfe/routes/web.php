<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::get('home/reponses',[OffreController::class,'reponses'])->name('home.reponses');
Route::get('home/vos-services',[OffreController::class,'services_id'])->name('home.vosservices');
Route::get('home/vos-demandes',[OffreController::class,'demandes_id'])->name('home.vosdemandes');
Route::post('home/commander',[CommandeController::class,'commanderService'])->name('home.commander');
Route::post('home/users/search',[UserController::class,'search'])->name('admin.user.search');
Route::get('home/reponses',[CommandeController::class,'commande_id'])->name('home.reponses');

Route::post('/commander-service',[ConsulterController::class,'commanderService'])->name('commander');



/*edit by hamza*/
Route::get('home/reponses',[CommandeController::class,'commande_id'])->name('home.reponses');
Route::post('/commandes/{id}/accepter', [CommandeController::class, 'accepterCommande'])->name('commande.accepter');
Route::post('/commandes/{id}/refuser', [CommandeController::class, 'refuserCommande'])->name('commande.refuser');

Route::get('home/reponse',[CommandeController::class,'commande'])->name('home.reponse');
