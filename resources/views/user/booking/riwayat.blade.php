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
    <h2 class="mb-4">Riwayat Booking Anda</h2>

    <table class="table table-striped">
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
                    <td>{{ $booking->jenis_servis }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}</td>
                    <td>
                        <span class="badge 
                            {{ $booking->status == 'pending' ? 'bg-warning' : ($booking->status == 'selesai' ? 'bg-success' : 'bg-info') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>{{ $booking->catatan ?? '-' }}</td>
                </tr>
            @empty
            @if(session('success'))
                                 <div class="alert alert-success">
                            {{ session('success') }}
                     </div>
           @endif
                <tr>
                    <td colspan="4" class="text-center">Belum ada booking</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if(alert){
            alert.style.display = 'none';
        }
    }, 4000); // hilang dalam 4 detik
</script>

</body>
</html>