<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}"> 
    <title>Document</title>
</head>
<body>


@extends('layouts.app')

@section('content')
<header class="navbar-top">
    <div class="logo">
        <i class="bi bi-tools"></i> Admin
    </div>

    <ul class="menu-nav">
        <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="{{ url('/')}}">🏠 Halaman utama</a></li>
        <li><a href="{{ route('admin.bookings.index') }}"><i class="bi bi-journal-text"></i> Kelola Booking</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="bi bi-journal-text"></i> Kelola User</a></li>
    </ul>

    {{-- Tombol Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</header>

<div class="container mt-5">
    <h2 class="fw-bold mb-4">Dashboard Admin</h2>
    
    <div class="row text-center">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5>Total Booking</h5>
                    <p class="fs-3 fw-bold text-primary">{{ $total_booking }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5>Selesai</h5>
                    <p class="fs-3 fw-bold text-success">{{ $selesai }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5>Proses</h5>
                    <p class="fs-3 fw-bold text-warning">{{ $proses }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5>Batal</h5>
                    <p class="fs-3 fw-bold text-danger">{{ $batal }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>