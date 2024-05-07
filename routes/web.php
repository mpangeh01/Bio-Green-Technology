<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('checkUserRole:Admin,Farmer,Dispatcher');


Route::middleware(['auth'])->group(function () {


    //FARM MANAGEMNT
    Route::get('/add-farm', [App\Http\Controllers\FarmController::class, 'create'])->name('add.farm');
    Route::post('/store-farm', [App\Http\Controllers\FarmController::class, 'store'])->name('store.farm');
    Route::get('/all-farms', [App\Http\Controllers\FarmController::class, 'index'])->name('all.farms');
    Route::get('/edit-farm/{id}', [App\Http\Controllers\FarmController::class, 'edit'])->name('edit.farm');


    //LOCATION MANAGEMENT
    Route::post('/update-location/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('update.location');
    Route::get('/delete-location/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('delete.location');


});
