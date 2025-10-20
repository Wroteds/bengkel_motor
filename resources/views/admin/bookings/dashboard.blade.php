@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}"> 
    <title>Dashboard Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<header class="navbar-top">
    <div class="logo">
        <i class="bi bi-tools"></i> Admin
    </div>

    <ul class="menu-nav">
        <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.bookings.index') }}"><i class="bi bi-journal-text"></i> 📋 Kelola Booking</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="bi bi-journal-text"></i> 👥 Kelola User</a></li>
        <li><a href="{{ route('admin.settings.pengaturan') }}"><i class="bi bi-gear"></i> Pengaturan</a></li>
        <li><a href="{{ url('/') }}">🏠 Halaman Utama</a></li>
    </ul>

    {{-- Tombol Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</header>
<!-- diagram booking -->
    <div class="mt-5">
        <h3 class="text-center mb-4">Statistik Booking</h3>
        <canvas id="bookingChart" width="400" height="150"></canvas>
    </div>
</div>

<script>
    const total_booking = @json($total_booking ?? 0);
    const selesai = @json($selesai ?? 0);
    const proses = @json($proses ?? 0);
    const batal = @json($batal ?? 0);

    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('bookingChart').getContext('2d');
        const bookingChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', 'Selesai', 'Proses', 'Batal'],
                datasets: [{
                    label: 'Jumlah Booking',
                    data: [total_booking, selesai, proses, batal],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>

</body>
</html>
@endsection
