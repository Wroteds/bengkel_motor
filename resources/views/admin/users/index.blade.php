<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('css/KelolaUser.css') }}"> 
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
        <li><a href="{{ route('admin.bookings.index') }}"><i class="bi bi-journal-text"></i>📋 Kelola Booking</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="bi bi-journal-text"></i>👥 Kelola User</a></li>
        <li><a href="{{ route('admin.settings.pengaturan') }}" class="active"><i class="bi bi-journal-text"></i>Pengaturan</a></li> 
        <li><a href="{{ url('/')}}">🏠 Halaman utama</a></li>
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
    <h2 class="fw-bold mb-4">👥 Kelola User</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-muted">Belum ada user terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

</body>
</html>