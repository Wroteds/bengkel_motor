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
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('user.booking.riwayat', compact('bookings'));
    }

    /**
     * 🔹 Halaman utama booking
     */
    public function utama()
    {
        return view('user.booking.utama');
    }

    /**
     * 🔹 Halaman form buat booking baru
     */
    public function create()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('user.booking.buat', compact('bookings'));
    }

    /**
     * 🔹 Proses simpan booking baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_servis' => 'required|string|max:255',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'catatan' => 'nullable|string',
            'kendaraan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        // ✅ Ambil batas booking dari tabel settings
        $setting = Setting::where('key', 'max_booking')->first();
        $maxBookingsPerWeek = $setting ? (int) $setting->value : 3; // default 3

        // ✅ Hitung booking user dalam 7 hari terakhir
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $userBookingsThisWeek = Booking::where('user_id', Auth::id())
            ->where('created_at', '>=', $sevenDaysAgo)
            ->where('status', '!=', 'batal')
            ->count();

        // ✅ Cek batas booking
        if ($userBookingsThisWeek >= $maxBookingsPerWeek) {
            return redirect()->back()->with(
                'booking_limit_popup',
                "Maaf, batas booking Anda adalah {$maxBookingsPerWeek} kali per 7 hari. Anda sudah mencapai batas."
            );
        }

        // ✅ Simpan booking baru
        Booking::create([
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

        return redirect()->back()->with('success', 'Status & catatan admin berhasil diperbarui.');
    }
}
