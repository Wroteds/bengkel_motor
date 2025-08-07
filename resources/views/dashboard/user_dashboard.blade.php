<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <style>
        body { font-family: sans-serif; background-color: #f5f5f5; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 800px; margin: auto; }
        h1 { color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2>Selamat Datang, {{ $user->name }}</h2>
        <p class="text-muted">Dashboard Pengguna</p>
    </div>

    <div class="d-grid gap-2 mb-4">
        <a 
            href="https://api.whatsapp.com/send?phone=6287887611225&text=gw%20ganteng" 
            target="_blank"
            class="btn btn-success btn-lg"
        >
            Booking Servis via WhatsApp
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Riwayat Servis Anda
        </div>
        <div class="card-body">
            @if($riwayatServis->isEmpty())
                <p class="text-muted">Belum ada riwayat servis yang tercatat.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Servis</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Servis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatServis as $index => $riwayat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $riwayat->nama_servis }}</td>
                                    <td>{{ $riwayat->deskripsi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($riwayat->tanggal_servis)->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
