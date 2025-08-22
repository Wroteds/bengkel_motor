<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingAdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->latest()->get();
        return view('admin.bookings.utama', compact('bookings'));
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
