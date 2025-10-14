<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')

<nav class="navbar">
    <div class="navbar-container">
        
        {{-- Logo atau Nama Aplikasi --}}
        <div class="navbar-logo">
            🛠️ Bengkel App
        </div>
        
        {{-- 2. Daftar Menu (UL) --}}
        <ul class="navbar-menu">
            <li><a href="{{ route('user.booking.create') }}" class="menu-link">📝 Booking</a></li>
            <li><a href="{{ route('user.riwayat') }}" class="menu-link active">🛠️ Riwayat Servis</a></li>
            <li><a href="{{ route('user.booking.index') }}" class="menu-link">⚙️ Layanan</a></li>

            <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link">🏠 Tampilan Awal</a></li>
        </ul>

        {{-- 3. Tombol Logout (Tetap di dalam Navbar-Container) --}}
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            {{-- Menggunakan class logout-btn yang sudah didefinisikan di CSS --}}
            <button type="submit" class="logout-btn">
                🚪 Logout
            </button>
        </form>
    </div>
</nav>

  <div class="riwayat-container">
     <h2 class="mb-4 text-center">Riwayat Booking Anda</h2>

  @if(session('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive">
<table class="table table-hover align-middle text-center">
  <thead>
    <tr>
      <th>Jenis Servis</th>
      <th>Tanggal</th>
      <th>Waktu Selesai</th>
      <th>Status</th>
      <th>Catatan</th>
    </tr>
  </thead>
  <tbody>
    @forelse($bookings as $booking)
      <tr>
        <td class="text-start">{{ $booking->jenis_servis }}</td>
        <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
        <td>
            {{ $booking->completion_time ? \Carbon\Carbon::parse($booking->completion_time)->format('d M Y H:i') : '-' }}
        </td>
        
        {{-- Baris ini yang diubah: menambahkan class 'text-center' --}}
        <td class="text-center">
            <span class="status-badge
                {{ in_array(strtolower($booking->status), ['pending','menunggu','proses']) ? 'pending' 
                : ($booking->status == 'selesai' ? 'selesai' 
                : ($booking->status == 'batal' ? 'batal' : '')) }}">
                {{ ucfirst($booking->status) }}
            </span>
        </td>
        <td class="text-start">{{ $booking->catatan ?? '-' }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center">Belum ada booking</td>
      </tr>
    @endforelse
  </tbody>
</table>

  </div>
</div>

<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">

<script>
  setTimeout(() => {
    let alert = document.querySelector('.alert');
    if(alert){
      alert.style.display = 'none';
    }
  }, 4000);
</script>
@endsection

</body>
</html>