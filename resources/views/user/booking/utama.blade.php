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

    <div class="layanan-slider">
        <div class="layanan-track">
            <div class="layanan-card">
                <img src="{{ asset('img/oli.png') }}" alt="Servis Ringan" class="layanan-img">
                <div class="layanan-info">
                <h4>Servis Ringan</h4>
                <p>Pengecekan busi, rantai, oli, dan rem motor.</p>
                <span class="harga">Rp 100.000</span>
            </div>
        </div>

            <div class="layanan-card">
                <img src="{{ asset('img/servis-berat.png') }}" alt="Servis Besar" class="layanan-img">
                <div class="layanan-info">
                <h4>Servis Besar</h4>
                <p>Pembersihan karburator, klep, piston, dan tune up mesin.</p>
                <span class="harga">Rp 250.000</span>
            </div>
            </div>

            <div class="layanan-card">
                <img src="{{ asset('img/rak oli.png') }}" alt="Ganti Oli" class="layanan-img">
                 <div class="layanan-info">
                <h4>Ganti Oli</h4>
                <p>Oli mesin + jasa ganti.</p>
                <span class="harga">Rp 55.000</span>
            </div>
            </div>

            <div class="layanan-card">
                <img src="{{ asset('img/rak ban.png') }}" alt="Ganti Ban" class="layanan-img">
                 <div class="layanan-info">
                <h4>Ganti Ban</h4>
                <p>Ban luar & dalam (harga sesuai ukuran).</p>
                <span class="harga">Rp 150.000</span>
            </div>
            </div>

            <div class="layanan-card">
                <img src="{{ asset('img/cat-motor.png') }}" alt="Cuci Motor" class="layanan-img">
                 <div class="layanan-info">
                <h4>Cat Body Motor</h4>
                <p>Terjamin Akan Bagus Untuk Hasilnya</p>
                <span class="harga">Rp 30.000</span>
            </div>
            </div>

            <div class="layanan-card">
                <img src="{{ asset('img/listrik.png') }}" alt="Ganti Aki" class="layanan-img">
                <div class="layanan-info">
                <h4>Kelistrikan</h4>
                <p>Memperbaiki Masalah Kelistrikan Pada Sepeda Motor</p>
                <span class="harga">Rp 200.000</span>
            </div>
         </div>

            <div class="layanan-card">
                <img src="{{ asset('img/servis-rem.png') }}" alt="Servis Rem" class="layanan-img">
                <div class="layanan-info">
                <h4>Servis Rem</h4>
                <p>Pengecekan dan servis rem depan & belakang.</p>
                <span class="harga">Rp 80.000</span>
            </div>
        </div>

            <div class="layanan-card">
                <img src="{{ asset('img/ganti-lampu.png') }}" alt="Ganti Lampu" class="layanan-img">
                 <div class="layanan-info">
                <h4>Ganti Lampu</h4>
                <p>Ganti lampu utama atau lampu sein.</p>
                <span class="harga">Rp 45.000</span>
            </div>
        </div>

            <div class="layanan-card">
                <img src="{{ asset('img/rantai.png') }}" alt="Servis Shockbreaker" class="layanan-img">
                <div class="layanan-info">
                <h4>Servis Rantai</h4>
                <p>perbaikan Rantai</p>
                <span class="harga">Rp 10.000</span>
            </div>
            </div>
        </div>
    </div>

    <div class="slider-buttons">
        <button id="prevBtn" class="slider-btn">⬅</button>
        <button id="nextBtn" class="slider-btn">➡</button>
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