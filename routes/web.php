<?php

use App\Http\Controllers\Admin\BookingAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk tampilan awal (home page)
Route::get('/', function () {
    return view('tampilan_awal');
});

// --- Rute Autentikasi ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/user/update-photo', [UserController::class, 'updatePhoto'])->name('user.updatePhoto')->middleware('auth');

//layanan
Route::view('/views/tampilan_awal', 'tampilan_awal')->name('user.tampilan_awal');
Route::view('/views/layanan', 'user.layanan')->name('user.layanan');

// --- Rute ADMIN ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/bookings', [BookingAdminController::class, 'index'])->name('bookings.index');
    Route::put('/bookings/{booking}/update-status', [BookingAdminController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/bookings/{booking}', [BookingAdminController::class, 'destroy'])->name('bookings.destroy');
});

// --- Rute USER ---
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');

    // Riwayat Booking
    Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');

    // Proses Booking
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});