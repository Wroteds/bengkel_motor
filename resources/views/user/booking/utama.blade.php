<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
    {{-- Tombol hamburger --}}
    <button class="hamburger" id="hamburgerBtn">&#9776;</button>

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

        {{-- Menu --}}
        <ul class="menu">
            <li><a href="{{ route('user.booking.create') }}" class="menu-link">📝 Booking</a></li>
            <li><a href="{{ route('user.riwayat') }}" class="menu-link">🛠️ Riwayat Servis</a></li>
            <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link">🏠 Tampilan Awal</a></li>
            <li><a href="{{ route('user.layanan') }}" class="menu-link">⚙️ Layanan</a></li>
        </ul>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn menu-link">🚪 Logout</button>
        </form>
    </aside>

    {{-- Konten utama --}}
    <main class="content">
        <div class="welcome-box">
            <h1>🚀 Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p>
                Kami siap membantu perawatan motor Anda dengan mudah, cepat, dan terpercaya.  
                Gunakan menu di sebelah kiri untuk mulai booking servis atau melihat riwayat servis motor Anda.
            </p>
            <p class="tagline">✨ Servis jadi lebih simpel, pengalaman berkendara lebih maksimal! ✨</p>
        </div>
    </main>
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