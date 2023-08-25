<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.signup');
});

Route::get('/signup', function () {
    return view('full.path.to.auth.signup');
});

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');

// Login and Logout Routes
Route::get('/login', '\App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('/login', '\App\Http\Controllers\AuthController@login');
// Renamed route names
//Route::get('/login', 'AuthController@showLoginForm')->name('login'); // Keep one route with the original name
//Route::post('/login', 'AuthController@login')->name('login.post'); // Rename the other route

Route::post('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');

// Signup Routes
//Route::get('/signup', '\App\Http\Controllers\AuthController@showSignupForm')->name('signup');
Route::post('/signup', '\App\Http\Controllers\AuthController@signup');


Route::post('/chat/{sender_user_id}/{receiver_user_id}/{place_id}', '\App\Http\Controllers\ChatController@sendMessage')->name('api.chat.send');
Route::get('/chat/{sender_user_id}/{receiver_user_id}/{place_id}', '\App\Http\Controllers\ChatController@fetchMessagesFromMe')->name('api.chat.fetch');

Route::get('/pet-azuke-places', '\App\Http\Controllers\AzukePlaceController@getAllPetAzukePlaces')->name('api.petallazukeplaces.fetch');
Route::get('/pet-azuke-places/{place_id}', '\App\Http\Controllers\AzukePlaceController@getPetAzukePlace')->name('getPetAzukePlace');


