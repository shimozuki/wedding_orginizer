<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', App\Http\Controllers\ProdukController::class);
Route::get('produk', 'App\Http\Controllers\ProdukController@produk');

Auth::routes();

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
Route::resource('pakets', \App\Http\Controllers\PaketController::class)
    ->middleware('auth');
Route::resource('promo', \App\Http\Controllers\PromoController::class)
    ->middleware('auth');
    
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
