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
      
      {{-- Logo --}}
      <div class="navbar-logo">
          🛠️ Ngawi Motor
      </div>

      {{-- Menu Navigasi --}}
      <ul class="navbar-menu" id="navbarMenu">
          <li><a href="{{ route('user.booking.create') }}" class="menu-link">📝 Booking</a></li>
          <li><a href="{{ route('user.riwayat') }}" class="menu-link active">🛠️ Riwayat Servis</a></li>
          <li><a href="{{ route('user.booking.utama') }}" class="menu-link">📋 Dashboard</a></li>
          <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link">🏠 Tampilan Awal</a></li>
      </ul>

      {{-- Bagian kanan navbar --}}
      <div class="navbar-right">
          {{-- Tombol Logout --}}
          <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
              @csrf
              <button type="submit" class="logout-btn">🚪 Logout</button>
          </form>

          {{-- Tombol Hamburger --}}
          <div class="hamburger" onclick="toggleMenu()">
              <span></span>
              <span></span>
              <span></span>
          </div>
      </div>

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
      <th>Catatan Anda</th>
      <th>Catatan Admin</th>
  </thead>
  <tbody>
    @forelse($bookings as $booking)
      <tr>
        <td class="text-start">{{ $booking->jenis_servis }}</td>
        <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
        <td>
            {{ $booking->completion_time ? \Carbon\Carbon::parse($booking->completion_time)->format('d M Y H:i') : '-' }}
        </td>
        
        <td class="text-center">
            <span class="status-badge
                {{ in_array(strtolower($booking->status), ['pending','menunggu','proses']) ? 'pending' 
                : ($booking->status == 'selesai' ? 'selesai' 
                : ($booking->status == 'batal' ? 'batal' : '')) }}">
                {{ ucfirst($booking->status) }}
            </span>
        </td>

        <td class="text-start">{{ $booking->catatan ?? '-' }}</td>
        <td class="text-start">
            {{ $booking->catatan_admin ?? '-' }} {{-- 🔹 Tampilkan catatan dari admin --}}
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="6" class="text-center">Belum ada booking</td>
      </tr>
    @endforelse
  </tbody>
</table>

  </div>
</div>

<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">

<script>
function toggleMenu() {
    document.getElementById('navbarMenu').classList.toggle('active');
  }

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