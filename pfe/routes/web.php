<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeControlle;

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

Auth::routes();

Route::get('/ajoute/offres',function (){
    return view('formulaire.ajouteOffre');
});

Route::get('/ajoute/users',function (){
    return view('formulaire.ajouteUser');
});
Route::get('/profil',function (){
    return view('page.pageparlogin');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/users', function () {
    return view('admin.user');
});

Route::get('/admin/offres', function () {
    return view('admin.offre');
});
Route::get('/services', function () {
    return view('page.services');
});
Route::get('/demandes', function () {
    return view('page.demandes');
});

Route::get('/profile', function () {
    return view('page.profile');
});

Route::get('/offres', function () {
    return view('page.ajouteOffre');
});
