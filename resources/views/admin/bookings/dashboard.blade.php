@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
@endpush


{{-- ================================
     NAVBAR FULL WIDTH
================================ --}}
@section('navbar')
<header class="navbar-top">
    <div class="logo">
        <i class="bi bi-tools"></i> Admin Panel
    </div>

    <button class="navbar-toggle" id="navbarToggle">
        ☰
    </button>

    <ul class="menu-nav" id="menuNav">
        <li><a href="{{ route('admin.dashboard') }}" class="active">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a></li>

        <li><a href="{{ route('admin.bookings.index') }}">
            <i class="bi bi-journal-text"></i> Kelola Booking
        </a></li>

        <li><a href="{{ route('admin.users.index') }}">
            <i class="bi bi-people"></i> Kelola User
        </a></li>

        <li><a href="{{ route('admin.settings.pengaturan') }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a></li>

        <li><a href="{{ url('/') }}">
            🏠 Halaman Utama
        </a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
</header>
@endsection



{{-- ================================
     CONTENT WRAPPER
================================ --}}
@section('content')

<div class="content-header">
    <h3>Statistik Booking</h3>
</div>

<div class="chart-container mt-4">
    <canvas id="bookingChart"></canvas>
</div>

@endsection



{{-- ================================
     SCRIPT CHART + MENU RESPONSIVE
================================ --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const total = @json($total_booking);
    const selesai = @json($selesai);
    const proses = @json($proses);
    const batal = @json($batal);

    document.addEventListener('DOMContentLoaded', () => {

        // Mobile Toggle Menu
        document.getElementById("navbarToggle").addEventListener("click", () => {
            document.getElementById("menuNav").classList.toggle("active");
        });

        // CHART
        const ctx = document.getElementById('bookingChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', 'Selesai', 'Proses', 'Batal'],
                datasets: [{
                    label: 'Jumlah Booking',
                    data: [total, selesai, proses, batal],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { 
                    y: { beginAtZero: true } 
                }
            }
        });
    });
</script>
@endpush
