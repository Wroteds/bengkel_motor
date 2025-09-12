<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Kelola Booking Servis</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="admin-dashboard">

    <!-- Tombol hamburger -->
    <button class="menu-toggle" id="menu-toggle">☰</button>
    <div class="sidebar-overlay"></div>
      
    {{-- Sidebar di sisi kiri --}}
    <aside class="sidebar">
        <div class="logo">⚙️ Admin</div>
        <!-- Tombol X -->
        <button class="close-btn" onclick="closeSidebar()">✖</button>
        <ul class="menu">
            <li><a href="{{ route('admin.bookings.index') }}" class="active">📋 Booking</a></li>
            <li><a href="{{ url('/')}}">🏠 Halaman utama</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </aside>

    {{-- Konten utama --}}
    <div class="content">

        <!-- Judul dashboard -->
        <h2 class="dashboard-header mb-4">
            <i class="bi bi-clipboard-check"></i> Kelola Booking
        </h2>

        <!-- Kartu Statistik -->
        <div class="stat-cards-container">
            <div class="stat-card">
                <h3>Total Booking</h3>
                <p>{{ $total_booking }}</p>
            </div>
            <div class="stat-card">
                <h3>Selesai</h3>
                <p>{{ $selesai }}</p>
            </div>
            <div class="stat-card">
                <h3>Proses</h3>
                <p>{{ $proses }}</p>
            </div>
            <div class="stat-card">
                <h3>Batal</h3>
                <p>{{ $batal }}</p>
            </div>
        </div>

        <!-- Tabel Booking -->
        <div class="card table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Jenis Servis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Waktu booking</th>
                        <th>Validasi booking</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td data-label="User">{{ $booking->user->name ?? '-' }}</td>
                        <td data-label="Jenis Servis">{{ $booking->jenis_servis }}</td>
                        <td data-label="Tanggal">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
                        <td data-label="Status">
                            <span class="badge 
                                {{ $booking->status == 'pending' ? 'bg-warning' : ($booking->status == 'proses' ? 'bg-info' : 'bg-success') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td data-label="Catatan">{{ $booking->catatan ?? '-' }}</td>
                        <td data-label="Waktu booking">
                            {{ \Carbon\Carbon::parse($booking->tanggal_booking)->diffForHumans(now(), true) }}
                        </td>
                        <td data-label="Aksi">
                            {{-- Ubah Status --}}
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm d-inline w-auto">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="proses" {{ $booking->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="batal" {{ $booking->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </form>

                            {{-- Hapus --}}
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data booking</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endpush

</body>
</html>
