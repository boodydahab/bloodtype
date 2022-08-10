<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
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

    Route::post('login', [AuthController::class, 'login'])->name("login");
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name("reset_password");
    Route::post('new-password', [AuthController::class, 'new_password'])->name("new_password");
    Route::post('register', [AuthController::class, 'register'])->name("register");
    Route::post('register-token', [AuthController::class, 'register_token'])->name("register_token");

    Route::group(['middleware'=>'auth:api'],function () {
        Route::get('notifications', [MainController::class, 'notifications']);
        Route::post('profile', [AuthController::class, 'profile']);
        Route::get('donation', [MainController::class, 'donations']);
        Route::post('contact', [MainController::class, 'contacts']);
        Route::get('posts', [MainController::class, 'posts']);
        Route::post('city', [MainController::class, 'city']);
        Route::get('governorates', [MainController::class, 'governorates']);
        Route::get('bloodtype', [MainController::class, 'bloodTypes']);
        Route::get('bloodtype/{id}', [MainController::class, 'bloodType']);
        Route::get('setting', [MainController::class, 'settings']);
        Route::post('client_governorate', [MainController::class, 'client_governorates']);

        Route::get('favourite-list', [MainController::class, 'favourite-list']);
        Route::post('donation-requests/create', [MainController::class, 'donation_requests_create']);

        Route::get('post/{id}', [MainController::class, 'post']);
        Route::post('togglefavorites', [MainController::class, 'toggleFavourite']);
    });
});
