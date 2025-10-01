<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Pastikan ini memuat file admin.css yang akan kita buat --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin Dashboard</title>
</head>
<body>

@extends('layouts.app')

@section('content')

<div class="navbar-top">
    <div class="logo">Admin</div>

    <!-- Tombol Hamburger -->
    <button class="navbar-toggle" onclick="document.querySelector('.menu-nav').classList.toggle('active')">
        ☰
    </button>

    <!-- Menu Navigasi -->
    <ul class="menu-nav">
        <li><a href="{{ route('admin.dashboard') }}" class="active">🏠 Dashboard</a></li>
        <li><a href="{{ url('/')}}">🏠 Halaman utama</a></li>
        <li><a href="{{ route('admin.bookings.index') }}">📋 Kelola Booking</a></li>
        <li><a href="{{ route('admin.users.index') }}">👥 Kelola User</a></li>
        <li>
            <form class="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </li>
    </ul>
</div>


{{-- Konten utama --}}
<div class="content-wrapper"> 
    
    {{-- Kartu Statistik --}}
    <div class="stat-cards-container">
        {{-- ... (Isi Kartu Statistik tetap sama) ... --}}
        <div class="stat-card total shadow-sm">
            <h3>Total Booking</h3>
            <p>{{ $total_booking }}</p>
        </div>
        <div class="stat-card selesai shadow-sm">
            <h3>Selesai</h3>
            <p>{{ $selesai }}</p>
        </div>
        <div class="stat-card proses shadow-sm">
            <h3>Proses</h3>
            <p>{{ $proses }}</p>
        </div>
        <div class="stat-card batal shadow-sm">
            <h3>Batal</h3>
            <p>{{ $batal }}</p>
        </div>
    </div>

    {{-- Judul Booking --}}
    <h2 class="content-header mt-5 mb-3">
        <i class="bi bi-clipboard-check"></i> Kelola Booking
    </h2>

    {{-- Tabel Booking --}}
    <div class="card table-card shadow">
        {{-- ... (Isi Tabel Booking tetap sama seperti sebelumnya) ... --}}
        <table class="table table-striped table-hover booking-table">
            <thead class="table-dark">
                <tr>
                    <th>User</th>
                    <th>Jenis Servis</th>
                    <th>Kendaraan</th> 
                    <th>Alamat</th> 
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Waktu Selesai</th>
                    <th>Validasi booking</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td data-label="User">{{ $booking->user->name ?? '-' }}</td>
                    <td data-label="Servis">{{ $booking->jenis_servis }}</td>
                    <td data-label="Kendaraan">{{ $booking->kendaraan ?? '-' }}</td>
                    <td data-label="Alamat" class="alamat-cell" title="{{ $booking->alamat ?? 'N/A' }}">{{ Str::limit($booking->alamat ?? '-', 30) }}</td>
                    <td data-label="Tanggal">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
                    <td data-label="Status">
                        <span class="status-badge status-{{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td data-label="Catatan" class="catatan-cell" title="{{ $booking->catatan ?? '-' }}">{{ Str::limit($booking->catatan ?? '-', 20) }}</td>
                    
                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline update-form">
                        @csrf
                        @method('PUT')
                        
                        <td data-label="Waktu Selesai">
                            <input type="datetime-local" name="completion_time" value="{{ $booking->completion_time ? \Carbon\Carbon::parse($booking->completion_time)->format('Y-m-d\TH:i') : '' }}" class="form-control form-control-sm datetime-input">
                        </td>
                        
                        <td data-label="Validasi booking">
                            <select name="status" class="form-select form-select-sm status-select">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ $booking->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="batal" {{ $booking->status == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </td>

                        <td data-label="Aksi" class="action-cell">
                            <button type="submit" class="btn btn-sm btn-primary action-btn save-btn">Simpan</button>
                    </form>
                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger action-btn delete-btn" onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
                    </form>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center p-4">Belum ada data booking.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@if(session('error'))
    <div class="alert alert-danger fixed-alert">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success fixed-alert">{{ session('success') }}</div>
@endif

<script src="{{ asset('js/admin.js') }}"></script> 

</body>
</html>