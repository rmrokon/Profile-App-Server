<?php

use App\Http\Controllers\InterestController;
use App\Http\Controllers\ProfileAttributeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('profileAttributes', ProfileAttributeController::class);
Route::resource('interests', InterestController::class);
Route::get('/users/search/{email}', [UserController::class, 'search']);
Route::get('/profiles/search/{user_id}', [ProfileController::class, 'search']);
Route::get('/profiles/searchWithUsername/{username}', [ProfileController::class, 'searchWithUsername']);
Route::get('/interests/search/{profile_attributes_id}', [InterestController::class, 'search']);

// Route::get('/users', [UserController::class, 'index']);

// Route::post('/users', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
