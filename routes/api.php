<?php

use App\Http\Controllers\Api\BloodTypeApiController;
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
Route::group(['prefix' => 'v1'], function () {
    Route::get('clients', [MainController::class, 'client']);
    Route::get('cities', [MainController::class, 'cities']);
    Route::get('posts', [MainController::class, 'posts']);
    Route::get('notifications', [MainController::class, 'notifications']);
    Route::get('settings', [MainController::class, 'settings']);
    Route::get('donation_requests', [MainController::class, 'donation_requests']);
    Route::get('client_governorates', [MainController::class, 'client_governorates']);
    //
    Route::prefix('governorates')->group(function () {
        Route::get('/', [GovernaorateApiController::class, 'index']);
        Route::get('/{governoratesId}', [GovernaorateApiController::class, 'show']);
        Route::post('/', [GovernaorateApiController::class, 'store']);
        Route::put('/{governoratesId}', [GovernaorateApiController::class, 'update']);
    });

    Route::prefix('bloodtype')->group(function () {
        Route::get('/', [BloodTypeApiController::class, 'index']);
        Route::get('/{bloodtypeId}', [BloodTypeApiController::class, 'show']);
        Route::post('/', [BloodTypeApiController::class, 'store']);
        Route::put('/{bloodtypeId}', [BloodTypeApiController::class, 'update']);
    });

    Route::get('client_posts', [MainController::class, 'client_posts']);
    Route::get('client_notifications', [MainController::class, 'client_notifications']);
    Route::get('contacts', [MainController::class, 'contacts']);
    Route::get('blood_type_clients', [MainController::class, 'blood_type_clients']);
});
