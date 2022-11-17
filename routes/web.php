<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovieController;
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

Route::get('/', [Controller::class, 'index']);
Route::get('/actors', [ActorController::class, 'viewActors']);

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
    Route::get('/movies/add', [MovieController::class, 'createMovie']);
    Route::get('/actors/add', [ActorController::class, 'createActor']);
    Route::get('/movies/edit/{id}', [MovieController::class, 'editMovie']);
    Route::get('/actors/edit/{id}', [ActorController::class, 'editActor']);

    Route::post('/movies/add', [MovieController::class, 'insertMovie']);
    Route::post('/actors/add', [ActorController::class, 'insertActor']);
    Route::post('/movies/editData/{id}', [MovieController::class, 'editDataMovie']);
    Route::post('/actors/editData/{id}', [ActorController::class, 'editDataActor']);
});
