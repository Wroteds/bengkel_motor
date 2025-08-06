<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; // Kita akan membuat ini nanti
use App\Models\User;
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

// --- Dashboard Routes ---
Route::middleware(['auth'])->group(function () {

    // User dashboard
    Route::middleware('role:user')->get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

    // Admin dashboard
    Route::middleware('role:admin')->get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});
// -- Riwayat servis --
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/riwayat-servis', [\App\Http\Controllers\Admin\RiwayatServisController::class, 'index'])->name('admin.riwayat.index');
    Route::post('/riwayat-servis', [\App\Http\Controllers\Admin\RiwayatServisController::class, 'store'])->name('admin.riwayat.store');
});
