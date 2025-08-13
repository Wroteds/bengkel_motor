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
<div class="container mt-4">
    <h2 class="text-success">Dashboard Admin</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form tambah riwayat servis --}}
    <div class="card mt-4 border-success">
        <div class="card-header bg-success text-white">Tambah Riwayat Servis</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.riwayat.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pilih User</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_servis" class="form-label">Nama Servis</label>
                    <input type="text" name="nama_servis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal_servis" class="form-label">Tanggal Servis</label>
                    <input type="date" name="tanggal_servis" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Riwayat</button>
            </form>
        </div>
    </div>

    {{-- Daftar semua user & riwayatnya --}}
    <h4 class="mt-5">Semua Riwayat Servis</h4>
    @foreach($users as $user)
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                {{ $user->name }} ({{ $user->email }})
            </div>
            <div class="card-body">
                @if($user->riwayatServis->isEmpty())
                    <p class="text-muted">Belum ada riwayat servis.</p>
                @else
                    <ul class="list-group">
                        @foreach($user->riwayatServis as $riwayat)
                            <li class="list-group-item">
                                <div>
                                <strong>{{ $riwayat->nama_servis }}</strong> - {{ $riwayat->tanggal_servis }}
                                <br>
                                <small>{{ $riwayat->deskripsi }}</small>
                                </div>
                                <form action="{{ route('admin.riwayat.hapus', $riwayat->id) }}" method="POST" onsubmit="return confirm('serius ingin mengghapusnya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endforeach

    {{-- Info selamat datang --}}
    <div class="mt-5 p-4 bg-light border rounded">
        <h5>Selamat Datang, {{ Auth::user()->name }}!</h5>
        <p>Ini adalah halaman khusus administrator. Anda memiliki akses penuh untuk mengelola pengguna, layanan, dan laporan.</p>
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection

</body>
</html>