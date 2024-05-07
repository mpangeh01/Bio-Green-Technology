<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\FactorController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\ListingController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\OtpController;
use App\Http\Controllers\API\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::post('password/reset', [UserController::class, 'sendResetLinkEmail']);


Route::middleware('auth:sanctum')->group(function () {


    
    Route::post('/logout', [UserController::class, 'logout']);



});
