<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="booking-card">
    <h2>Booking Servis</h2>
    <form action="{{ route('user.booking.store') }}" method="POST" id="bookingForm">
      @csrf
      <div class="mb-3">
        <label for="jenis_servis" class="form-label">Jenis Servis</label>
        <input type="text" name="jenis_servis" id="jenis_servis" class="form-control" placeholder="Contoh: Servis Mesin" required>
      </div>

      <div class="mb-3">
        <label for="tanggal_booking" class="form-label">Tanggal Booking</label>
        <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Tambahkan catatan jika perlu..."></textarea>
      </div>

      <button type="submit" class="btn btn-custom w-100">Kirim Booking</button>
    </form>
  </div>
</div>

<!-- Link ke CSS & JS -->
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
<script src="{{ asset('js/booking.js') }}"></script>
@endsection


</body>
</html>