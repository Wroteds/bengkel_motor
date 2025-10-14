<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}"> 
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<header class="navbar-top">
    {{-- Navbar content remains the same --}}
    <div class="logo">
        <i class="bi bi-tools"></i> Admin
    </div>

    <ul class="menu-nav">
        <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.bookings.index') }}"><i class="bi bi-journal-text"></i> 📋 Kelola Booking</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="bi bi-journal-text"></i>👥 Kelola User</a></li>
        <li><a href="{{ route('admin.settings.pengaturan') }}" class="active"><i class="bi bi-journal-text"></i>Pengaturan</a></li> 
        <li><a href="{{ url('/')}}">🏠 Halaman utama</a></li>
    </ul>

    {{-- Tombol Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</header>


{{-- Ganti class Tailwind dengan class CSS kustom --}}
<div class="p-8 min-h-screen"> 
    <div class="setting-header"> 
        <h2>
            <i class="bi bi-gear-fill"></i> Pengaturan Sistem
        </h2>
        {{-- Ganti class tombol --}}
        <button onclick="openModal()" class="btn-ubah-batas">
            Ubah Batas Booking
        </button>
    </div>

    {{-- Ganti class info box --}}
    <div class="info-box"> 
        <h4>Batas Booking Aktif Saat Ini</h4>
        <p>{{ $maxBooking->value ?? 3 }}</p>
    </div>
</div>

{{-- Ganti class modal --}}
<div id="modal" class="modal-wrapper"> 
    <div class="modal-content">
        {{-- Ganti class tombol close --}}
        <button onclick="closeModal()" class="modal-close-btn">&times;</button>
        <h3>Ubah Batas Booking</h3>

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')
    <label for="max_booking">Batas Maksimal Booking per Minggu:</label>
    <input 
        type="number" 
        name="max_booking" 
        id="max_booking" 
        class="form-control" 
        value="{{ $maxBooking->value ?? '' }}" 
        min="1" max="10" required>

    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
</form>

    </div>
</div>

@endsection

@push('scripts')
<script>
    function openModal() {
        const modal = document.getElementById('modal');
        // Kita hanya perlu mengubah display dari 'none' menjadi 'flex' (sesuai CSS baru)
        modal.style.display = 'flex'; 
    }
    function closeModal() {
        const modal = document.getElementById('modal');
        // Ubah display kembali ke 'none'
        modal.style.display = 'none'; 
    }
    
    // Opsional: Tutup modal jika mengklik di luar area modal
    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
@endpush

</body>
</html>