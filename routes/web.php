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
    Route::post('/registerPage', [UserController::class, 'register']);
    Route::post('/loginPage', [UserController::class, 'login']);
});

Route::group(['middleware' => 'loggedinsecurity'], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});