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
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk tampilan awal (home page)
Route::get('/', function () {
    return view('tampilan_awal'); // Menggunakan tampilan_awal.blade.php yang Anda berikan
});

// --- Rute Autentikasi ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/user/update-photo', [UserController::class, 'updatePhoto'])->name('user.updatePhoto')->middleware('auth');



// --- Dashboard Routes ---
Route::middleware(['auth'])->group(function () {
    Route::middleware('role:user')->get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
});

//riwayat servis
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

//layanan
Route::view('/views/tampilan_awal', 'user.tampilan_awal')->name('user.tampilan_awal');
Route::view('/views/layanan', 'user.layanan')->name('user.layanan');

// booking
Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/buat', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.utama');
});


//user booking
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');
    Route::get('/booking/buat', [BookingController::class, 'create'])->name('booking.buat');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.utama');
});

//ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
     Route::get('/bookings', [BookingAdminController::class, 'index'])->name('bookings.index');
    Route::put('/bookings/{booking}/update-status', [BookingAdminController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/bookings/{booking}', [BookingAdminController::class, 'destroy'])->name('bookings.destroy');
});


//USER
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
     Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');
     Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
     Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});

