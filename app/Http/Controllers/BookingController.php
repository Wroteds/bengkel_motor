<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Fungsi untuk menampilkan riwayat booking user
    public function riwayat()
    {
        // Mendapatkan data booking untuk user yang sedang login
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();

        // Mengirimkan variabel $bookings ke view 'user.booking.riwayat'
        return view('user.booking.riwayat', compact('bookings'));
    }

    public function create()
    {
         $bookings = Booking::where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('user.booking.buat', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_servis' => 'required|string|max:255',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'catatan' => 'nullable|string',
            'kendaraan' => 'required|string|max:255',
            'alamat'    => 'required|string',
           
        ]);
        $max_bookings_per_week = 3; 
        $seven_days_ago = Carbon::now()->subDays(7); 
        $user_booking_this_week = Booking::where('user_id',Auth::id())
              ->where('created_at', '>=', $seven_days_ago)
              ->where('status', '!=', 'batal')
              ->count();
        if($user_booking_this_week >= $max_bookings_per_week){
            return redirect()->back()->withErrors([
                'booking_limit' => 'Maaf Hanya Bisa' . $max_bookings_per_week . 'Booking 3x dalam satu minggu(7 hari). Anda sudah mencapai batas'
            ]);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'jenis_servis' => $request->jenis_servis,
            'kendaraan' => $request->kendaraan,
            'alamat' => $request->alamat,
            'catatan' => $request->catatan,
            'tanggal_booking' => $request->tanggal_booking,
            'status' => 'menunggu'
        ]);

        return redirect()->route('user.riwayat')->with('success', 'Booking berhasil dibuat!');
    }
}