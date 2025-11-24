<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-container">

        {{-- Logo --}}
        <div class="navbar-logo">
            🛠️ Ngawi Motor
        </div>

        {{-- Menu NAV --}}
        <ul class="navbar-menu">
            <li><a href="{{ route('user.booking.create') }}">📝 Booking</a></li>
            <li><a href="{{ route('user.riwayat') }}" class="active">🛠️ Riwayat Servis</a></li>
            <li><a href="{{ route('user.booking.utama') }}">📋 Dashboard</a></li>
        </ul>

    </div>
</nav>

<!-- Main Content -->
<div class="main-content">

    <div class="riwayat-container">

        <h2 class="text-center">Riwayat Booking Anda</h2>

        {{-- Alert Sukses --}}
        @if(session('success'))
            <div class="alert alert-success text-center mt-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th>Jenis Servis</th>
                        <th>Tanggal</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
                        <th>Catatan Anda</th>
                        <th>Catatan Admin</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td class="text-start">{{ $booking->jenis_servis }}</td>

                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>

                        <td>
                            {{ $booking->completion_time 
                                ? \Carbon\Carbon::parse($booking->completion_time)->format('d M Y H:i')
                                : '-' 
                            }}
                        </td>

                        <td>
                            <span class="status-badge
                                {{ in_array(strtolower($booking->status), ['pending','menunggu','proses']) ? 'pending'
                                    : ($booking->status == 'selesai' ? 'selesai'
                                    : ($booking->status == 'batal' ? 'batal' : '')) }}">

                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>

                        {{-- Catatan User --}}
                        <td class="text-start">{{ $booking->catatan ?? '-' }}</td>

                        {{-- Catatan Admin --}}
                        <td class="text-start">{{ $booking->catatan_admin ?? '-' }}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada booking</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- tombol di hp -->
<div class="mobile-nav">
    <a href="{{ route('user.booking.create') }}" class="mobile-item">
        📝
        <span>Booking</span>
    </a>

    <a href="{{ route('user.riwayat') }}" class="mobile-item active">
        🛠️
        <span>Riwayat</span>
    </a>

    <a href="{{ route('user.booking.utama') }}" class="mobile-item">
        📋
        <span>Dashboard</span>
    </a>
</div>

{{-- SCRIPT --}}
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if(alert){
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 300);
        }
    }, 3500);
</script>

@endsection

</body>
</html>