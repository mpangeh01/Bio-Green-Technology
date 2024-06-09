<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ExpenseCategoryController;
use App\Http\Controllers\API\IncomeCategoryController;
use App\Http\Controllers\API\FishTypeController;
use App\Http\Controllers\API\FeedTypeController;
use App\Http\Controllers\API\PondController;
use App\Http\Controllers\API\FishAdditionController;

use App\Http\Controllers\API\RegisterController;


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

//Route::post('password/reset', [UserController::class, 'sendResetLinkEmail']);


Route::middleware('auth:sanctum')->group(function () {



    //Route::post('/logout', [UserController::class, 'logout']);

    // Expense Category Routes
    Route::prefix('expense-categories')->group(function () {
        Route::get('/', [ExpenseCategoryController::class, 'index']);
        Route::post('/', [ExpenseCategoryController::class, 'store']);
        Route::put('/{id}', [ExpenseCategoryController::class, 'update']);
        Route::delete('/{id}', [ExpenseCategoryController::class, 'destroy']);
    });

    Route::prefix('income-categories')->group(function () {
        Route::get('/', [IncomeCategoryController::class, 'index']);
        Route::post('/', [IncomeCategoryController::class, 'store']);
        Route::get('/{id}', [IncomeCategoryController::class, 'show']);
        Route::put('/{id}', [IncomeCategoryController::class, 'update']);
        Route::delete('/{id}', [IncomeCategoryController::class, 'destroy']);
    });

    Route::prefix('fish-types')->group(function () {
        Route::get('/', [FishTypeController::class, 'index']);
        Route::post('/', [FishTypeController::class, 'store']);
        Route::get('/{id}', [FishTypeController::class, 'show']);
        Route::put('/{id}', [FishTypeController::class, 'update']);
        Route::delete('/{id}', [FishTypeController::class, 'destroy']);
    });

    Route::prefix('feed-types')->group(function () {
        Route::get('/', [FeedTypeController::class, 'index']);
        Route::post('/', [FeedTypeController::class, 'store']);
        Route::get('/{id}', [FeedTypeController::class, 'show']);
        Route::put('/{id}', [FeedTypeController::class, 'update']);
        Route::delete('/{id}', [FeedTypeController::class, 'destroy']);
    });

    Route::prefix('ponds')->group(function () {
        Route::get('/', [PondController::class, 'index']);
        Route::post('/', [PondController::class, 'store']);
        Route::get('/{id}', [PondController::class, 'show']);
        Route::put('/{id}', [PondController::class, 'update']);
        Route::delete('/{id}', [PondController::class, 'destroy']);
    });

    Route::prefix('fish-additions')->group(function () {
        Route::get('/', [FishAdditionController::class, 'index']);
        Route::post('/', [FishAdditionController::class, 'store']);
        Route::put('/{id}', [FishAdditionController::class, 'update']);
        Route::delete('/{id}', [FishAdditionController::class, 'destroy']);
    });


});
