<?php
use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\Blood_type_clientController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Client_governorateController;
use App\Http\Controllers\Client_notificationController;
use App\Http\Controllers\Client_postController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\donation_requestController;
use App\Http\Controllers\governoratesController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::prefix('client')->name('client.')->group(function () {
    Route::get('/', [ClientController::class, 'index'], ['name' => 'index']);
});

Route::prefix('bloodtype')->name('bloodtype.')->group(function () {
    Route::get('/', [BloodTypeController::class, 'index'], ['name' => 'index']);
});

Route::prefix('city')->name('city.')->group(function () {
    Route::get('/', [CityController::class, 'index'], ['name' => 'index']);
    Route::post('/', [CityController::class, 'store'], ['name' => 'store']);
    Route::post('/xyz', [CityController::class, 'newfn'], ['name' => 'newfn']);
});

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/', [PostController::class, 'index'], ['name' => 'index']);
});

Route::prefix('notification')->name('notification.')->group(function () {
    Route::get('/', [notificationController::class, 'index'], ['name' => 'index']);
});

Route::prefix('setting')->name('setting.')->group(function () {
    Route::get('/', [settingController::class, 'index'], ['name' => 'index']);
});

Route::prefix('donation_request')->name('donation_request.')->group(function () {
    Route::get('/', [donation_requestController::class, 'index'], ['name' => 'index']);
});

Route::prefix('client_governorate')->name('client_governorate.')->group(function () {
    Route::get('/', [Client_governorateController::class, 'index'], ['name' => 'index']);
});

Route::prefix('governorates')->name('governorates.')->group(function () {
    Route::get('/', [governoratesController::class, 'index'], ['name' => 'index']);
});

Route::prefix('client_post')->name('client_post.')->group(function () {
    Route::get('/', [Client_postController::class, 'index'], ['name' => 'index']);
});

Route::prefix('client_notification')->name('client_notification.')->group(function () {
    Route::get('/', [Client_notificationController::class, 'index'], ['name' => 'index']);
});

Route::prefix('contacts')->name('contacts.')->group(function () {
    Route::get('/', [ContactsController::class, 'index'], ['name' => 'index']);
});

Route::prefix('blood_type_client')->name('blood_type_client.')->group(function () {
    Route::get('/', [Blood_type_clientController::class, 'index'], ['name' => 'index']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('token/sanctum',[TokenController::class,'getToken']);

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
