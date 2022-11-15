<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'guestsecurity'], function () {
    Route::get('/loginPage', [UserController::class, 'viewLogin']);
    Route::get('/registerPage', [UserController::class, 'viewRegister']);
    Route::post('/loginPage', [UserController::class, 'login']);;
    Route::post('/registerPage', [UserController::class, 'register']);
});

Route::group(['middleware' => 'loggedinsecurity'], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::group(['middleware' => 'memberinsecurity'], function () {
    // Route::get('/logout', [UserController::class, 'logout']);
});

Route::group(['middleware' => 'adminsecurity'], function () {
    // Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/add/movie', function() {
        return view('createMovie');
    });
});
