<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Hitung data booking milik user login
        $total_booking = Booking::where('user_id', $userId)->count();
        $selesai = Booking::where('user_id', $userId)->where('status', 'Selesai')->count();
        $pending = Booking::where('user_id', $userId)->where('status', 'Pending')->count();
        $proses  = Booking::where('user_id', $userId)->where('status', 'Proses')->count();
        $batal   = Booking::where('user_id', $userId)->where('status', 'Batal')->count();

        return view('admin.bookings.dashboard', compact(
            'total_booking',
            'selesai',
            'pending',
            'proses',
            'batal'
        ));
    }
}
