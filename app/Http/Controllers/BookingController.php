<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

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
            'catatan' => 'nullable|string'
        ]);

        // Hitung jumlah booking user pada tanggal yang sama
        $jumlahBooking = Booking::where('user_id', Auth::id())
            ->whereDate('tanggal_booking', $request->tanggal_booking)
            ->count();

        if ($jumlahBooking >= 3) {
            return redirect()->back()->withErrors([
                'tanggal_booking' => 'Anda sudah mencapai batas maksimal 3 booking untuk tanggal ini.'
            ]);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'jenis_servis' => $request->jenis_servis,
            'catatan' => $request->catatan,
            'tanggal_booking' => $request->tanggal_booking,
            'status' => 'menunggu'
        ]);

        return redirect()->route('user.riwayat')->with('success', 'Booking berhasil dibuat!');
    }
}