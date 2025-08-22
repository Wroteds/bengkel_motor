<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/admin.css">
    
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="admin-dashboard">

    {{-- Konten utama --}}
    <div class="content">
        <h2 class="mb-4">
            <i class="bi bi-clipboard-check"></i> Kelola Booking Servis
        </h2>

        <div class="card">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>User</th>
                        <th>Jenis Servis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Waktu booking</th>
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
                            {{\Carbon\Carbon::parse($booking->tanggal_booking)->diffForHumans(now(), true)}}
                        </td>
                       
                       
                       
                        <td data-label="Aksi">
                            {{-- Ubah Status --}}
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('POT')
                                <select name="status" class="form-select form-select-sm d-inline w-auto">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="proses" {{ $booking->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
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

    {{-- Sidebar kanan --}}
    <aside class="sidebar">
        <div class="logo">⚙️ Admin</div>
        <ul class="menu">
            <li><a href="{{ route('admin.bookings.index') }}" class="active">📋 Booking</a></li>
            <li><a href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </aside>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/admin.js') }}"></script>
@endsection

</body>
</html>