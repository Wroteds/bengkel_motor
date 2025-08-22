<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Layanan Bengkel')

@section('content')
<div class="layanan-container">
    <h2 class="mb-4">Daftar Layanan Bengkel</h2>

    <div class="layanan-grid">
        <div class="layanan-card">
            <h4>Servis Ringan</h4>
            <p>Pengecekan oli, rem, busi, rantai, dan setelan motor.</p>
            <span class="harga">Rp 80.000</span>
        </div>

        <div class="layanan-card">
            <h4>Servis Besar</h4>
            <p>Pembersihan karburator, klep, piston, dan tune up mesin.</p>
            <span class="harga">Rp 250.000</span>
        </div>

        <div class="layanan-card">
            <h4>Ganti Oli</h4>
            <p>Oli mesin + jasa ganti.</p>
            <span class="harga">Rp 55.000</span>
        </div>

        <div class="layanan-card">
            <h4>Ganti Ban</h4>
            <p>Ban luar & dalam (harga sesuai ukuran).</p>
            <span class="harga">Rp 150.000</span>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
@endpush

</body>
</html>