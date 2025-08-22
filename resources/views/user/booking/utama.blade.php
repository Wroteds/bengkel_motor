<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 @extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="card-btn">
    <a href="https://wa.me/6281234567890" target="_blank" class="service-card">
        <h3>📱 Booking via WhatsApp</h3>
        <p>Pesan servis dengan mudah langsung melalui WhatsApp.</p>
    </a>

    <a href="{{ route('user.riwayat') }}" class="service-card grey">
        <h3>🛠️ Riwayat Servis</h3>
        <p>Lihat catatan servis motor Anda dengan lengkap.</p>
    </a>

    {{-- Booking lewat sistem --}}
    <a href="{{ route('user.booking.create') }}" class="service-card grey">
        <h3>📝 Booking</h3>
        <p>Buat booking servis motor Anda di sini.</p>
    </a>
</div>

{{-- Tombol hamburger --}}
<button class="hamburger" id="hamburgerBtn">&#9776;</button>

{{-- Sidebar --}}
<aside class="sidebar" id="sidebarMenu">
    <div class="user-profile text-center">
        {{-- Form upload foto profil --}}
        <form id="photoForm" action="{{ route('user.updatePhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="profileInput">
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
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
            <input type="file" name="profile_photo" id="profileInput" class="d-none" accept="image/*" onchange="document.getElementById('photoForm').submit();">
        </form>
        <h3>{{ Auth::user()->name }}</h3>
    </div>

    {{-- Menu --}}
    <ul class="menu">
        <li><a href="return view('tampilan_awal')" class="menu-link">🏠 Tampilan Awal</a></li>
        <li><a href="{{ route('user.layanan') }}" class="menu-link">⚙️ Layanan</a></li>
    </ul>

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn menu-link">🚪 Logout</button>
    </form>
</aside>
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