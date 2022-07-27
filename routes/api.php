<?php

use App\Http\Controllers\Api\BloodTypeApiController;
use App\Http\Controllers\Api\CitiesApiController;
use App\Http\Controllers\Api\PostsApiController;
use App\Http\Controllers\Api\GovernaorateApiController;
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
Route::group(['prefix' => 'v1','namespace' =>'auth:api'], function () {
    Route::get('clients', [MainController::class, 'client']);
    Route::get('donation_requests', [MainController::class, 'donation_requests']);
    Route::get('client_governorates', [MainController::class, 'client_governorates']);
    Route::get('client_posts', [MainController::class, 'client_posts']);
    Route::get('client_notifications', [MainController::class, 'client_notifications']);
    Route::get('blood_type_clients', [MainController::class, 'blood_type_clients']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    //
    Route::prefix('governorates')->group(function () {
        Route::get('/', [GovernaorateApiController::class, 'index']);
        Route::get('/{governoratesId}', [GovernaorateApiController::class, 'show']);
    });
    Route::prefix('post')->group(function () {
        Route::get('/', [PostsApiController::class, 'index']);
        Route::get('/{postId}', [PostApiController::class, 'show']);
    });

    Route::prefix('bloodtype')->group(function () {
        Route::get('/', [BloodTypeApiController::class, 'index']);
        Route::get('/{bloodtypeId}', [BloodTypeApiController::class, 'show']);

    });

    Route::prefix('cities')->group(function () {
        Route::get('/', [CitiesApiController::class, 'index']);
        Route::get('/{cityId}', [CitiesApiController::class, 'show']);

    });
    Route::prefix('notifications')->group(function () {
        Route::get('/', [CitiesApiController::class, 'index']);
        Route::get('/{notificationsId}', [CitiesApiController::class, 'show']);

    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [CitiesApiController::class, 'index']);
        Route::get('/{settingsId}', [CitiesApiController::class, 'show']);

    });
    Route::prefix('donation_requests')->group(function () {
        Route::get('/', [CitiesApiController::class, 'index']);
        Route::get('/{donation_requestsId}', [CitiesApiController::class, 'show']);

    });






    Route::prefix('contacts')->group(function () {
        Route::post('/', [CitiesApiController::class, 'index']);
        Route::post('/{contactsId}', [CitiesApiController::class, 'show']);

    });
    Route::prefix('register')->group(function () {
        Route::post('/', [CitiesApiController::class, 'index']);
        Route::post('/{registerId}', [CitiesApiController::class, 'show']);

    });

});
