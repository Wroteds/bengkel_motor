<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking Anda</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Memuat CSS riwayat.css (yang berisi styling navbar) --}}
    <link rel="stylesheet" href="riwayat.css"> 
</head>
<body>

{{-- NAVBAR BARU (Menggantikan Sidebar) --}}
<nav class="navbar">
    <div class="navbar-container">
        {{-- Logo atau Nama Aplikasi --}}
        <div class="navbar-logo">
            🛠️ BengkelGO
        </div>
        
        {{-- Menu Navigasi --}}
        <ul class="navbar-menu">
            <li><a href="{{ route('user.tampilan_awal') }}" class="menu-link">🏠 Tampilan Awal</a></li>
            <li><a href="{{ route('user.layanan') }}" class="menu-link">⚙️ Layanan</a></li>
            <li><a href="{{ route('user.booking.create') }}" class="menu-link">📝 Booking</a></li>
            {{-- Tambahkan class 'active' untuk halaman yang sedang aktif --}}
            <li><a href="{{ route('user.riwayat') }}" class="menu-link active">🛠️ Riwayat Servis</a></li>
        </ul>

        {{-- Logout Button --}}
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn navbar-link" style="
                background: none; 
                border: 2px solid #fff; 
                color: #fff; 
                padding: 8px 15px; 
                border-radius: 20px; 
                cursor: pointer; 
                font-weight: 500;
                transition: 0.3s;">
                🚪 Logout
            </button>
        </form>
    </div>
</nav>

{{-- KONTEN UTAMA (Riwayat Booking) --}}
<div class="riwayat-container">
    <h2>Riwayat Booking Anda</h2>

    <table class="table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Jenis Servis</th>
                <th>Tanggal</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ganti mesin</td>
                <td>24 Oct 2025</td>
                <td>-</td>
                <td style="text-align: center;">
                    <span class="status-badge pending">Menunggu</span>
                </td>
                <td>asfasf</td>
            </tr>
            <tr>
                <td>ganti mesin</td>
                <td>15 Oct 2025</td>
                <td>10 Oct 2025<br>11:07</td>
                <td style="text-align: center;">
                    <span class="status-badge" style="background: orange; color: #fff;">Proses</span>
                </td>
                <td>sdfsdf</td>
            </tr>
            {{-- Tambahkan baris lain di sini --}}
        </tbody>
    </table>
</div>

</body>
</html>