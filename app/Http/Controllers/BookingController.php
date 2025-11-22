<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * 🔹 Menampilkan riwayat booking user
     */
    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.booking.riwayat', compact('bookings'));
    }

    /**
     * 🔹 Halaman utama dashboard booking user
     */
    public function utama()
    {
        return view('user.booking.utama');
    }

    /**
     * 🔹 Form buat booking baru
     */
    public function create()
    {
        return view('user.booking.buat');
    }

    /**
     * 🔹 Proses simpan booking baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_servis'      => 'required|string|max:255',
            'tanggal_booking'   => 'required|date|after_or_equal:today',
            'catatan'           => 'nullable|string',
            'kendaraan'         => 'required|string|max:255',
            'alamat'            => 'nullable|string|max:255',
        ]);

        /**
         * =============================
         *  🔥 BATAS BOOKING PER MINGGU
         * =============================
         */
        $setting = Setting::where('key', 'max_booking')->first();
        $maxBookingsPerWeek = $setting ? (int) $setting->value : 3;

        $sevenDaysAgo = Carbon::now()->subDays(7);

        $userBookingsThisWeek = Booking::where('user_id', Auth::id())
            ->where('created_at', '>=', $sevenDaysAgo)
            ->where('status', '!=', 'batal')
            ->count();

        if ($userBookingsThisWeek >= $maxBookingsPerWeek) {
            return redirect()
                ->back()
                ->with('booking_limit_popup', "Batas booking Anda adalah {$maxBookingsPerWeek} kali per 7 hari.");
        }

        /**
         * =============================
         * 🔥 SIMPAN BOOKING BARU
         * =============================
         */
        Booking::create([
            'user_id'         => Auth::id(),
            'jenis_servis'    => $request->jenis_servis,
            'kendaraan'       => $request->kendaraan,
            'alamat'          => $request->alamat,
            'catatan'         => $request->catatan,
            'tanggal_booking' => $request->tanggal_booking,
            'status'          => 'menunggu',  // default
        ]);

        return redirect()
            ->route('user.riwayat')
            ->with('success_popup', 'Booking berhasil dibuat!');
    }

    /**
     * 🔹 Admin memperbarui status, waktu selesai, dan catatan admin
     */
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = $request->input('status');
        $booking->completion_time = $request->input('completion_time');
        $booking->catatan_admin = $request->input('catatan_admin');
        $booking->save();

        return redirect()
            ->back()
            ->with('success', 'Status dan catatan admin berhasil diperbarui.');
    }
}
