<?php

use App\Http\Controllers\Admin\BookingAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

// --- Lupa PW ---
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

//layanan
Route::view('/views/tampilan_awal', 'tampilan_awal')->name('user.tampilan_awal');
Route::view('/views/layanan', 'user.layanan')->name('user.layanan');

// --- Rute ADMIN ---
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    // Booking
    Route::get('/bookings', [BookingAdminController::class, 'index'])->name('bookings.index');
    Route::put('/bookings/{booking}/update-status', [BookingAdminController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/bookings/{booking}', [BookingAdminController::class, 'destroy'])->name('bookings.destroy');

    // Kelola User
    Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserAdminController::class, 'destroy'])->name('users.destroy');
    
    // Setting
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.pengaturan');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
 
});

// --- Rute USER ---
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    
    // Kelola Booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Riwayat
    Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');

    // Kelola User (Profile)
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});
