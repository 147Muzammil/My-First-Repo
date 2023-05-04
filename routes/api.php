<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JSVillasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LocationModelController;
use App\Http\Controllers\BHKModelController;


Route::post('html_email', [MailController::class, 'html_email']);

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
# Villas Api
Route::post('js_villas', [JSVillasController::class, 'create']);
Route::get('js_villas', [JSVillasController::class, 'getAllData']);
Route::post('addVillaImage', [JSVillasController::class, 'addVillaImage']);
Route::post('addVilla', [JSVillasController::class, 'addVilla']);
Route::post('additionalImages', [JSVillasController::class, 'additionalImages']);
Route::post('addVillaVideo', [JSVillasController::class, 'addVillaVideo']);
Route::put('js_villas/{id}', [JSVillasController::class, 'update']);
Route::delete('js_villas/{id}', [JSVillasController::class, 'destroy']);
Route::get('filterPractice', [JSVillasController::class, 'filterPractice']);
Route::get('index', [JSVillasController::class, 'index']);
Route::get('js_villas/{id}', [JSVillasController::class, 'show']);
Route::post('filterVilla', [JSVillasController::class, 'filterVilla']);
Route::get('villaTemp', [JSVillasController::class, 'villaTemp']);

# Booking API
Route::post('booking', [BookingController::class, 'create']);
Route::get('booking', [BookingController::class, 'index']);
Route::get('booking/{id}', [BookingController::class, 'show']);
Route::put('booking/{id}', [BookingController::class, 'update']);
Route::delete('booking/{id}', [BookingController::class, 'destroy']);
Route::get('prac', [BookingController::class, 'prac']);

#Amenities API
Route::post('amenities', [AmenitiesController::class, 'create']);
Route::get('amenities', [AmenitiesController::class, 'index']);
Route::get('amenities/{id}', [AmenitiesController::class, 'show']);
Route::put('amenities/{id}', [AmenitiesController::class, 'update']);
Route::delete('amenities/{id}', [AmenitiesController::class, 'destroy']);



# Admin Api
Route::post('admin', [AdminsController::class, 'adminStore']);

# User API
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('user', [AuthController::class, 'user']);
});

# Location API
Route::post('location', [LocationModelController::class, 'create']);

#BHK API
Route::post('bhk_route', [BHKModelController::class, 'create']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
