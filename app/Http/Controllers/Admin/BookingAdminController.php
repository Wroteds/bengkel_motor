<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingAdminController extends Controller
{
    public function index()
    {
        // Ambil semua booking + relasi user
        $bookings = Booking::with('user')->latest()->get();
        
        // Hitung total booking berdasarkan status
        $total_booking = $bookings->count();
        $selesai = $bookings->where('status', 'selesai')->count();
        $proses = $bookings->where('status', 'proses')->count();
        $batal = $bookings->where('status', 'batal')->count();
        $pending = $bookings->where('status', 'pending')->count(); 
    
        // Kirimkan semua variabel yang sudah dihitung ke view
        return view('admin.bookings.booking', compact(
            'bookings',
            'total_booking',
            'selesai',
            'proses',
            'batal'
        ));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
       //valildasi input
       $request->validate([
          'status' =>['required', Rule::in(['pending', 'proses', 'selesai', 'batal'])],
          'completion_time' => ['nullable', 'date'],
       ]);
       
       
        $booking->status = $request->status;
        
        if ($request->has('completion_time')){
            $booking->completion_time = $request->completion_time;
        }
              
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