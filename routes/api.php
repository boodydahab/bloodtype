<?php

use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('city', [MainController::class, 'city']);
    Route::get('governorates', [MainController::class, 'governorates']);
    Route::get('bloodtype', [MainController::class, 'bloodTypes']);
    Route::get('bloodtype/{id}', [MainController::class, 'bloodType']);
    Route::get('setting', [MainController::class, 'settings']);

    Route::post('client_governorate', [MainController::class, 'cli ent_governorates']);

    Route::post('login', [AuthController::class, 'login'])->name("login");
    Route::post('new_password', [AuthController::class, 'new_password'])->name("new_password");
    Route::post('register', [AuthController::class, 'register'])->name("register");

    Route::middleware('auth:api')->group(function () {
        Route::get('notification', [MainController::class, 'notifications']);
        Route::get('donation', [MainController::class, 'donations']);
        Route::post('contact', [MainController::class, 'contacts']);
        Route::post('post', [MainController::class, 'posts']);
    });
});
