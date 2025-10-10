<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('user.booking.riwayat', compact('bookings'));
    }

    public function create()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
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

    // Ambil batas booking dari setting
    $setting = \App\Models\Setting::where('key', 'max_booking')->first();
    $max_bookings_per_week = $setting ? (int)$setting->value : 3;

    $seven_days_ago = \Carbon\Carbon::now()->subDays(7);
    $user_booking_this_week = \App\Models\Booking::where('user_id', Auth::id())
        ->where('created_at', '>=', $seven_days_ago)
        ->where('status', '!=', 'batal')
        ->count();

    if ($user_booking_this_week >= $max_bookings_per_week) {
        // 🔹 Kembalikan ke halaman sebelumnya dengan pesan popup (session)
        return redirect()->back()->with('booking_limit_popup', "Maaf, batas booking Anda adalah {$max_bookings_per_week} kali per 7 hari. Anda sudah mencapai batas.");
    }

    \App\Models\Booking::create([
        'user_id' => Auth::id(),
        'jenis_servis' => $request->jenis_servis,
        'kendaraan' => $request->kendaraan,
        'alamat' => $request->alamat,
        'catatan' => $request->catatan,
        'tanggal_booking' => $request->tanggal_booking,
        'status' => 'menunggu',
    ]);

    return redirect()->route('user.riwayat')->with('success_popup', 'Booking berhasil dibuat!');
}

}