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
    <div class="container">
        <h1>Halo, {{ $user->name }}!</h1>
        <p>Berikut riwayat servis Anda:</p>

        <table>
            <thead>
                <tr>
                    <th>Tanggal Servis</th>
                    <th>Jenis Servis</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayatServis as $servis)
                    <tr>
                        <td>{{ $servis->tanggal_servis }}</td>
                        <td>{{ $servis->jenis_servis }}</td>
                        <td>{{ $servis->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Belum ada riwayat servis.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
