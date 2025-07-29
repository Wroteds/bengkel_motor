<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; // Kita akan membuat ini nanti

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Gunakan POST untuk logout

// --- Rute Dashboard (Membutuhkan Autentikasi) ---
Route::middleware(['auth'])->group(function () {
    // Rute untuk dashboard user
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

    // Rute untuk dashboard admin (membutuhkan middleware 'admin')
    Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('tampilan_awal'); // file tampilan_awal.blade.php
        })->middleware('auth');

    });
});