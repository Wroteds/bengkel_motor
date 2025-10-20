<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
@extends('layouts.app') {{-- opsional kalau kamu pakai layout --}}

@section('content')
<!-- Tombol hamburger untuk mobile -->
<button class="hamburger" id="hamburger">&#9776;</button>

  {{-- Sidebar --}}
    <aside class="sidebar" id="sidebarMenu">
        <div class="user-profile text-center">
            {{-- Form upload foto profil --}}
            <form id="photoForm" action="{{ route('user.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="profileInput">
                    @if(Auth::user()->profile_foto)
                        <img src="{{ asset('storage/' . Auth::user()->profile_foto) }}" 
                             class="profile-img" 
                             id="profilePreview"
                             alt="Foto Profil">
                    @else
                        <img src="{{ asset('img/gear.png') }}" 
                             class="profile-img" 
                             id="profilePreview"
                             alt="Default Foto">
                    @endif
                </label>
                <input type="file" name="profile_foto" id="profileInput" class="d-none" accept="image/*" onchange="document.getElementById('photoForm').submit();">
            </form>

            <h3>{{ Auth::user()->name }}</h3>
        </div>



    <ul class="menu">
        <li><a href="{{ route('user.riwayat') }}" class="menu-link"><i class="fa-solid fa-screwdriver-wrench"></i>📝 Riwayat Servis</a></li>
        <li><a href="{{ route('user.booking.create') }}" class="menu-link"><i class="fa-regular fa-file-lines"></i>🛠️ Booking</a></li>
        <li><a href="{{ route('user.dashboard') }}" class="menu-link active"><i class="fa-solid fa-chart-line"></i>📋 Dashboard</a></li>
        <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link"><i class="fa-solid fa-house"></i>🏠 Tampilan Awal</a></li>
    </ul>

    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</aside>

<!-- Konten Utama -->
<main class="content">
    <div class="layanan-container">
        <h2>Daftar Layanan Bengkel</h2>
        <div class="layanan-grid">
            <div class="layanan-card">
                <h4>Servis Ringan</h4>
                <p>Pengecekan busi, rantai, oli, dan rem motor.</p>
                <span class="harga">Rp 100.000</span>
            </div>
            <div class="layanan-card">
                <h4>Servis Besar</h4>
                <p>Pembersihan karburator, klep, piston, dan tune up mesin.</p>
                <span class="harga">Rp 250.000</span>
            </div>
            <div class="layanan-card">
                <h4>Ganti Oli</h4>
                <p>Oli mesin + jasa ganti.</p>
                <span class="harga">Rp 55.000</span>
            </div>
            <div class="layanan-card">
                <h4>Ganti Ban</h4>
                <p>Ban luar & dalam (harga sesuai ukuran).</p>
                <span class="harga">Rp 150.000</span>
            </div>
        </div>
    </div>
</main>

<!-- JavaScript Sidebar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const sidebar = document.querySelector('.sidebar');

    if (hamburger && sidebar) {
        hamburger.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }
});
</script>

@endsection


{{-- Tambahkan CSS khusus halaman ini --}}
@push('styles')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

{{-- Tambahkan JS khusus halaman ini --}}
@push('scripts')
<script src="{{ asset('js/user.js') }}"></script>
@endpush
</body>
</html>