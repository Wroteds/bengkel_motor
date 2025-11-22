<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
@extends('layouts.app')

@section('content')

<!-- HAMBURGER MOBILE -->
<button class="hamburger" id="hamburgerBtn">&#9776;</button>

{{-- SIDEBAR --}}
<aside class="sidebar" id="sidebarMenu">

    <div class="user-profile text-center">

        <form id="photoForm" action="{{ route('user.updatePhoto') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            <label for="profileInput">
                @if(Auth::user()->profile_foto)
                    <img src="{{ asset('storage/' . Auth::user()->profile_foto) }}"
                         class="profile-img" id="profilePreview">
                @else
                    <img src="{{ asset('img/gear.png') }}"
                         class="profile-img" id="profilePreview">
                @endif
            </label>

            <input type="file" name="profile_foto" id="profileInput"
                   class="d-none" accept="image/*"
                   onchange="document.getElementById('photoForm').submit();">
        </form>

        <h3>{{ Auth::user()->name }}</h3>
    </div>

    <ul class="menu">
        <li><a href="{{ route('user.riwayat') }}" class="menu-link">🛠️ Riwayat Servis</a></li>
        <li><a href="{{ route('user.booking.create') }}" class="menu-link">📝 Booking</a></li>
        <li><a href="{{ route('user.dashboard') }}" class="menu-link active">📋 Dashboard</a></li>
        <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link">🏠 Tampilan Awal</a></li>
    </ul>

    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>

</aside>

<!-- MAIN CONTENT -->
<main class="content">

<div class="layanan-container">
    <h2>Daftar Layanan Bengkel</h2>

    <div class="layanan-slider">
        <div class="layanan-track">

            @php
                $items = [
                    ['img' => 'oli.png', 'title' => 'Servis Ringan', 'text' => 'Pengecekan busi & oli.', 'harga' => 'Rp 100.000'],
                    ['img' => 'servis-berat.png', 'title' => 'Servis Besar', 'text' => 'Tune up mesin lengkap.', 'harga' => 'Rp 250.000'],
                    ['img' => 'rak oli.png', 'title' => 'Ganti Oli', 'text' => 'Oli mesin premium.', 'harga' => 'Rp 55.000'],
                    ['img' => 'rak ban.png', 'title' => 'Ganti Ban', 'text' => 'Ban luar & dalam.', 'harga' => 'Rp 150.000'],
                    ['img' => 'cat-motor.png', 'title' => 'Cat Body Motor', 'text' => 'Hasil cat premium.', 'harga' => 'Rp 30.000'],
                    ['img' => 'listrik.png', 'title' => 'Kelistrikan', 'text' => 'Perbaikan kelistrikan.', 'harga' => 'Rp 200.000'],
                    ['img' => 'servis-rem.png', 'title' => 'Servis Rem', 'text' => 'Servis rem depan-belakang.', 'harga' => 'Rp 80.000'],
                    ['img' => 'ganti-lampu.png', 'title' => 'Ganti Lampu', 'text' => 'Lampu utama & sein.', 'harga' => 'Rp 45.000'],
                    ['img' => 'rantai.png', 'title' => 'Servis Rantai', 'text' => 'Perbaikan rantai.', 'harga' => 'Rp 10.000'],
                ];
            @endphp

            @foreach ($items as $item)
            <div class="layanan-card">
                <img src="{{ asset('img/'.$item['img']) }}" class="layanan-img">
                <div class="layanan-info">
                    <h4>{{ $item['title'] }}</h4>
                    <p>{{ $item['text'] }}</p>
                    <span class="harga">{{ $item['harga'] }}</span>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="slider-buttons">
        <button id="prevBtn" class="slider-btn">⬅</button>
        <button id="nextBtn" class="slider-btn">➡</button>
    </div>
</div>

</main>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/user.js') }}"></script>
@endpush

</body>
</html>