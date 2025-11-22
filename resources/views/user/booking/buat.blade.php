@extends('layouts.app')

@section('title', 'Buat Booking')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endpush

@section('navbar')

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">🛠️ Ngawi Motor</div>
        <ul class="navbar-menu">
            <li><a href="{{ route('user.booking.create') }}" class="active">📝 Booking</a></li>
            <li><a href="{{ route('user.riwayat') }}">🛠️ Riwayat Servis</a></li>
            <li><a href="{{ route('user.booking.utama') }}">📋 Dashboard</a></li>
        </ul>
    </div>
</nav>

<div class="main-content">
    <div class="booking-container">

        <h2 class="text-center">Buat Booking Baru</h2>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success text-center mt-2">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert error --}}
        @if (session('error'))
            <div class="alert alert-danger text-center mt-2">
                {{ session('error') }}
            </div>
        @endif

        @error('booking_limit')
            <div class="alert alert-danger text-center mt-2">
                {{ $message }}
            </div>
        @enderror

        {{-- FORM --}}
        <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Jenis Servis</label>
                <input type="text" name="jenis_servis" class="form-control" placeholder="Contoh: Servis Mesin" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data Kendaraan</label>
                <textarea name="kendaraan" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal & Jam Booking</label>
                <input type="datetime-local" name="tanggal_booking" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat (Opsional)</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea name="catatan" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-custom">Kirim Booking</button>
        </form>

    </div>
</div>

{{-- POPUP --}}
@if(session('booking_limit_popup'))
<div id="popupLimit" class="popup-overlay">
    <div class="popup-box">
        <h3>⚠️ Booking Penuh</h3>
        <p>{{ session('booking_limit_popup') }}</p>
        <button onclick="closePopup()" class="popup-btn">OK</button>
    </div>
</div>
@endif

@if(session('success_popup'))
<div id="popupSuccess" class="popup-overlay">
    <div class="popup-box success">
        <h3>✅ Berhasil</h3>
        <p>{{ session('success_popup') }}</p>
        <button onclick="closePopupSuccess()" class="popup-btn success-btn">OK</button>
    </div>
</div>
@endif

<!-- MOBILE NAVIGATION (TAMPIL DI HP) -->
<div class="mobile-nav">
    <a href="{{ route('user.booking.create') }}"
       class="mobile-item {{ request()->routeIs('user.booking.create') ? 'active' : '' }}">
        📝
        <span>Booking</span>
    </a>

    <a href="{{ route('user.riwayat') }}"
       class="mobile-item {{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
        🛠️
        <span>Riwayat</span>
    </a>

    <a href="{{ route('user.booking.utama') }}"
       class="mobile-item {{ request()->routeIs('user.booking.utama') ? 'active' : '' }}">
        📋
        <span>Dashboard</span>
    </a>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/booking.js') }}"></script>
@endpush
