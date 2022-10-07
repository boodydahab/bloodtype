<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\Donation_requestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
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
// Route::get('/', function () {
//     return view('front.home');
// });

Route::group(['namespace' => 'Front'], function(){
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('about', [MainController::class, 'about'])->name('about');
    Route::get('post', [MainController::class, 'post']);
    Route::get('donations', [MainController::class, 'donations']);
    Route::get('contact', [MainController::class, 'contact'])->name('contact');
    // Route::get('create-account', [MainController::class, 'create-account']);
    Route::get('client-register', [AuthController::class, 'register']);
    Route::get('signin', [AuthController::class, 'signin'])->name('signin');
    Route::post('log_in', [AuthController::class, 'login'])->name('log_in');
    Route::post('toggle-favourite', [MainController::class, 'toggleFavourite'])->name('toggle-favourite');
});

// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/', function () {
//     return view('welcome');
// })->name('name');



Auth::routes();
// Route::get('/home',[HomeController::class])->index('home');

Route::group(['prefix' => 'admin'],function () {
    Auth::routes();
});//Admin panal
Route::group(['middleware' => ['auth:web'] , 'prefix' => 'admin'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
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
    Route::resource('permission', PermissionController::class);

    Route::get('user/change-password',[UserController::class,'changePassword']);
    Route::post('user/change-password',[UserController::class,'ChangePasswordSave']);
});
