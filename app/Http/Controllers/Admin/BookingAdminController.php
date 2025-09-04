<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index()
    {
        // Ambil semua booking + relasi user
        $bookings = Booking::with('user')->latest()->get();

        // Hitung total
        $total_booking = Booking::count();

        // Hitung per status
        $selesai = Booking::where('status', 'selesai')->count();
        $proses  = Booking::where('status', 'proses')->count();
        $batal   = Booking::where('status', 'batal')->count();

        return view('admin.bookings.utama', compact(
            'bookings',
            'total_booking',
            'selesai',
            'proses',
            'batal'
        ));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking berhasil dihapus.');
    }

    public function riwayat()
    {
        $bookings = \App\Models\Booking::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.booking.riwayat', compact('bookings'));
    }
}

  