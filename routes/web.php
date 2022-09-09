<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Donation_requestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\Governorate;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Auth::routes();
// Route::get('/home',[HomeController::class])->index('home');

Auth::routes();
//Admin panal
Route::group(['middelware' => ['auth','auto-check-permission'] , 'prefix' => 'admin'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('governorate', GovernorateController::class);
    Route::resource('city', CityController::class);
    Route::resource('post', PostController::class);
    Route::resource('client', ClientController::class);
    Route::resource('donation', Donation_requestController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('report', CategoryController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);

    Route::get('user/change-password', 'UserController@ChangePassword');
    Route::post('user/change-password', 'UserController@ChangePasswordSave');
});
