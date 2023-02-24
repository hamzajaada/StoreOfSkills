<?php

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
// Route::get('home/profile',[UserController::class,'profile'])->name('home.profile');
Route::get('home/services',[OffreController::class,'services'])->name('home.services');
Route::get('home/demandes',[OffreController::class,'demandes'])->name('home.demandes');
Route::get('home/vos-services',[OffreController::class,'services_id'])->name('home.vosservices');
Route::get('home/vos-demandes',[OffreController::class,'demandes_id'])->name('home.vosdemandes');
