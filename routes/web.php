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
    Route::post('/update-farm/{id}', [App\Http\Controllers\FarmController::class, 'update'])->name('update.farm');
    Route::get('/delete-farm/{id}', [App\Http\Controllers\FarmController::class, 'destroy'])->name('delete.farm');

    //POND MANAGEMNT
    Route::get('/add-pond', [App\Http\Controllers\PondController::class, 'create'])->name('add.pond');
    Route::post('/store-pond', [App\Http\Controllers\PondController::class, 'store'])->name('store.pond');
    Route::get('/all-ponds', [App\Http\Controllers\PondController::class, 'index'])->name('all.ponds');
    Route::get('/edit-pond/{id}', [App\Http\Controllers\PondController::class, 'edit'])->name('edit.pond');
    Route::post('/update-pond/{id}', [App\Http\Controllers\PondController::class, 'update'])->name('update.pond');
    Route::get('/delete-pond/{id}', [App\Http\Controllers\PondController::class, 'destroy'])->name('delete.pond');

    //POND MANAGEMNT
    Route::get('/all-users', [App\Http\Controllers\UserController::class, 'index'])->name('all.users');

});
