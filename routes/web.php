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
    ->middleware('checkUserRole:Admin,Accountant,Dispatcher');


Route::middleware(['auth'])->group(function () {


    //LOCATION MANAGEMENT
    Route::get('/add-location', [App\Http\Controllers\LocationController::class, 'create'])->name('add.location');
    Route::post('/store-location', [App\Http\Controllers\LocationController::class, 'store'])->name('store.location');
    Route::get('/all-locations', [App\Http\Controllers\LocationController::class, 'index'])->name('all.locations');
    Route::get('/edit-location/{id}', [App\Http\Controllers\LocationController::class, 'edit'])->name('edit.location');
    Route::post('/update-location/{id}', [App\Http\Controllers\LocationController::class, 'update'])->name('update.location');
    Route::get('/delete-location/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('delete.location');

    //FARE MANAGEMENT
    Route::get('/add-fare', [App\Http\Controllers\FareController::class, 'create'])->name('add.fare');
    Route::post('/store-fare', [App\Http\Controllers\FareController::class, 'store'])->name('store.fare');
    Route::get('/all-fares', [App\Http\Controllers\FareController::class, 'index'])->name('all.fares');
    Route::get('/edit-fare/{id}', [App\Http\Controllers\FareController::class, 'edit'])->name('edit.fare');
    Route::post('/update-fare/{id}', [App\Http\Controllers\FareController::class, 'update'])->name('update.fare');
    Route::get('/delete-fare/{id}', [App\Http\Controllers\FareController::class, 'destroy'])->name('delete.fare');

    //FARE FACTOR MANAGEMENT
    Route::get('/fare-factor', [App\Http\Controllers\FareFactorController::class, 'index'])->name('fare.factor');
    Route::get('/edit-fare-factor/{id}', [App\Http\Controllers\FareFactorController::class, 'edit'])->name('edit.factor');
    Route::post('/update-factor/{id}', [App\Http\Controllers\FareFactorController::class, 'update'])->name('update.factor');

    //LISTING PERCETNAGE MANAGEMENT
    Route::get('/percent', [App\Http\Controllers\PercentageModelController::class, 'index'])->name('percent');
    Route::get('/edit-percent/{id}', [App\Http\Controllers\PercentageModelController::class, 'edit'])->name('edit.percent');
    Route::post('/update-percent/{id}', [App\Http\Controllers\PercentageModelController::class, 'update'])->name('update.percent');


    //CAR MAKE MANAGEMNET
    Route::get('/add-make', [App\Http\Controllers\CarMakeController::class, 'create'])->name('add.make');
    Route::post('/store-make', [App\Http\Controllers\CarMakeController::class, 'store'])->name('store.make');
    Route::get('/all-makes', [App\Http\Controllers\CarMakeController::class, 'index'])->name('all.makes');
    Route::get('/edit-make/{id}', [App\Http\Controllers\CarMakeController::class, 'edit'])->name('edit.make');
    Route::post('/update-make/{id}', [App\Http\Controllers\CarMakeController::class, 'update'])->name('update.make');
    Route::get('/delete-make/{id}', [App\Http\Controllers\CarMakeController::class, 'destroy'])->name('delete.make');

    //CAR TYPE MANAGEMENT
    Route::get('/add-type', [App\Http\Controllers\CarTypeController::class, 'create'])->name('add.type');
    Route::post('/store-type', [App\Http\Controllers\CarTypeController::class, 'store'])->name('store.type');
    Route::get('/all-types', [App\Http\Controllers\CarTypeController::class, 'index'])->name('all.types');
    Route::get('/edit-type/{id}', [App\Http\Controllers\CarTypeController::class, 'edit'])->name('edit.type');
    Route::post('/update-type/{id}', [App\Http\Controllers\CarTypeController::class, 'update'])->name('update.type');
    Route::get('/delete-type/{id}', [App\Http\Controllers\CarTypeController::class, 'destroy'])->name('delete.type');

    //CAR MODEL MANAGEMENT
    Route::get('/add-model', [App\Http\Controllers\CarModelController::class, 'create'])->name('add.model');
    Route::post('/store-model', [App\Http\Controllers\CarModelController::class, 'store'])->name('store.model');
    Route::get('/all-models', [App\Http\Controllers\CarModelController::class, 'index'])->name('all.models');
    Route::get('/edit-model/{id}', [App\Http\Controllers\CarModelController::class, 'edit'])->name('edit.model');
    Route::post('/update-model/{id}', [App\Http\Controllers\CarModelController::class, 'update'])->name('update.model');
    Route::get('/delete-model/{id}', [App\Http\Controllers\CarModelController::class, 'destroy'])->name('delete.model');

    //CAR MANAGEMENT
    Route::get('/all-cars', [App\Http\Controllers\CarController::class, 'index'])->name('all.cars');
    Route::get('/unapproved-cars', [App\Http\Controllers\CarController::class, 'unapprovedCars'])->name('unapproved.cars');
    Route::get('/approved-cars', [App\Http\Controllers\CarController::class, 'approvedCars'])->name('approved.cars');
    Route::get('/car-inspection/{id}', [App\Http\Controllers\CarController::class, 'inspectCar'])->name('car.inspection');
    Route::get('/approve-car/{id}', [App\Http\Controllers\CarController::class, 'approveCar'])->name('approve.car');

    //LISTING MANAGEMENT
    Route::get('/all-listings', [App\Http\Controllers\ListingController::class, 'index'])->name('all.listings');
    Route::get('/unapproved-listings', [App\Http\Controllers\ListingController::class, 'unapprovedListings'])->name('unapproved.listings');
    Route::get('/approved-listings', [App\Http\Controllers\ListingController::class, 'approvedListings'])->name('approved.listings');
    Route::get('/approve-listing/{id}', [App\Http\Controllers\ListingController::class, 'approveListing'])->name('approve.listing');

    //BOOKING MANAGEMENT
    Route::get('/all-bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('all.bookings');
    Route::get('/approved-bookings', [App\Http\Controllers\BookingController::class, 'approvedBookings'])->name('approved.bookings');
    Route::get('/unapproved-bookings', [App\Http\Controllers\BookingController::class, 'unapprovedBookings'])->name('unapproved.bookings');
    Route::get('/approve-booking/{id}', [App\Http\Controllers\BookingController::class, 'approveBooking'])->name('approve.booking');
    Route::get('/decline-booking/{id}', [App\Http\Controllers\BookingController::class, 'declineBooking'])->name('decline.booking');

    //USER MANAGEMENT
    Route::get('/all-users', [App\Http\Controllers\UserController::class, 'index'])->name('all.users');
    Route::get('/user-details/{id}', [App\Http\Controllers\UserController::class, 'getUserDetails'])->name('user.details');
    Route::post('/update-user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update.user');
    Route::get('/add-user', [App\Http\Controllers\UserController::class, 'getAddUserForm'])->name('add.user');
    Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('store.user');
    Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete.user');





});
