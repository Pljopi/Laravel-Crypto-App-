<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController as FavoriteController;

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
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Path: routes/auth.php


Route::controller(FavoriteController::class)->group(function () {

	Route::get('favorite', 'webListFavorites')->name('favorite');
	Route::get('favorite/add', 'webAddToFavorite')->name('favorite/add');
	Route::get('favorite/remove', 'webRemoveFromFavorite')->name('favorite/remove');
	Route::get('favorite/list', 'webListAllCurrencies')->name('favorite/list');
});
