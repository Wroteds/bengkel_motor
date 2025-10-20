<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Hitung semua data booking (bukan hanya milik admin login)
        $total_booking = Booking::count();
        $selesai = Booking::where('status', 'Selesai')->count();
        $pending = Booking::where('status', 'Pending')->count();
        $proses  = Booking::where('status', 'Proses')->count();
        $batal   = Booking::where('status', 'Batal')->count();

        return view('admin.bookings.dashboard', compact(
            'total_booking',
            'selesai',
            'pending',
            'proses',
            'batal'
        ));
    }
}
