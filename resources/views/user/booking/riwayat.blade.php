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
        <td colspan="4" class="text-center">Belum ada booking</td>
      </tr>
    @endforelse
  </tbody>
</table>

  </div>
</div>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">

<!-- JS -->
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