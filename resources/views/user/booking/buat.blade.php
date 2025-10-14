<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Buat Booking')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card booking-card">
                {{-- Form Booking --}}
                <form action="{{ route('user.booking.store') }}" method="POST" id="bookingForm">
                    @csrf
                    
                    {{-- START: KODE BARU UNTUK MENAMPILKAN ERROR BATAS BOOKING --}}
                    @error('booking_limit')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- END: KODE BARU --}}


    {{-- Form Booking --}}
    <form action="{{ route('user.booking.store') }}" method="POST" id="bookingForm">
      @csrf

      <div class="mb-3">
        <label for="jenis_servis" class="form-label">Jenis Servis</label>
        <input 
          type="text" 
          name="jenis_servis" 
          id="jenis_servis" 
          class="form-control" 
          placeholder="Contoh: Servis Mesin" 
          required>
      </div>

      <div class="mb-3">
        <label for="kendaraan" class="form-label">Data Kendaraan(Motor)</label>
        <textarea 
          name="kendaraan" 
          id="kendaraan" 
          class="form-control" 
          rows="3" 
          placeholder="Harus Diisi!" 
          required></textarea>
      </div>

      <div class="mb-3">
        <label for="tanggal_booking" class="form-label">Tanggal Booking & Jam Booking</label>
        <input 
          type="datetime-local" 
          name="tanggal_booking" 
          id="tanggal_booking" 
          class="form-control" 
          required>
      </div>
        
     <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea 
          name="alamat" 
          id="alamat" 
          class="form-control" 
          rows="3" 
          placeholder="Masukkan alamat lengkap Anda jika motor ingin diambil"></textarea>
      </div>

      <div class="mb-3">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea 
          name="catatan" 
          id="catatan" 
          class="form-control" 
          rows="3" 
          placeholder="Tambahkan catatan jika perlu..."></textarea>
      </div>

      <button type="submit" class="btn btn-custom w-100">
        Kirim Booking
      </button>
    </form>
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/booking.js') }}"></script>
@endpush

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('booking_limit_popup'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Batas Booking Tercapai!',
    text: "{{ session('booking_limit_popup') }}",
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
});
</script>
@endif

@if (session('success_popup'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: "{{ session('success_popup') }}",
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
});
</script>
@endif

</body>
</html>