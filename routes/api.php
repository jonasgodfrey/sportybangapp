<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserEarningsCheckController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Auth Routes
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::post('/verify_otp', [ApiAuthController::class, 'verify_otp'])->middleware('auth:sanctum');
Route::get('/notifications', [UserEarningsCheckController::class, 'notifications'])->middleware('auth:sanctum');

//Protected Routes
Route::get('/verify_payments', [UserEarningsCheckController::class, 'sendemail']);

