<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\LapanganController;
use App\Http\Controllers\Back\OwnerController;
use App\Http\Controllers\Back\TimeSlotController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\Front\CustomerController;
use App\Http\Controllers\Back\ViewPerMonthController;
use App\Http\Controllers\GuestController;

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


Route::get('/', [GuestController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'registerProcess']);
});

Route::get('/home', function () {
    return redirect('/');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/pengelola', AdminController::class)->middleware('userAkses:admin');
    Route::resource('/admin/time-slot', TimeSlotController::class)->middleware('userAkses:admin');
    Route::resource('/admin/lapangan', LapanganController::class)->middleware('userAkses:admin');
    Route::get('/admin/bookings-per-month', [ViewPerMonthController::class, 'index'])->middleware('userAkses:admin');

    Route::get('/owner', [OwnerController::class, 'index'])->middleware('userAkses:owner');
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->middleware('userAkses:owner');

    Route::get('/customer', [CustomerController::class, 'index'])->middleware('userAkses:user');
    Route::resource('/user-booking', BookingController::class)->middleware('userAkses:user');
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/user-home', [GuestController::class, 'index'])->middleware('userAkses:user');;
});
