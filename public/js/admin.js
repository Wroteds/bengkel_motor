document.addEventListener('DOMContentLoaded', function() {
    // 1. Menghilangkan Notifikasi Setelah Beberapa Detik
    const alerts = document.querySelectorAll('.fixed-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';
            // Menghapus elemen setelah transisi selesai
            setTimeout(() => alert.remove(), 500); 
        }, 5000); // Notifikasi hilang setelah 5 detik
    });

    // 2. Interaksi Hover pada Baris Tabel (Opsional: jika styling CSS tidak cukup)
    const tableRows = document.querySelectorAll('.booking-table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.backgroundColor = '#e9f5ff'; // Warna hover kustom
        });
        row.addEventListener('mouseleave', () => {
            // Gunakan warna dasar atau warna striping jika ada
            if (!row.classList.contains('table-striped')) {
                 row.style.backgroundColor = 'white';
            } else {
                 row.style.backgroundColor = ''; // Biarkan CSS yang mengatur
            }
        });
    });

    // 3. Konfirmasi Hapus yang Lebih Menarik (Memerlukan library, ini hanya contoh dasar)
    // Jika Anda menggunakan SweetAlert atau library lain, tambahkan kodenya di sini.
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus data booking ini? Aksi ini tidak dapat dibatalkan.')) {
                e.preventDefault();
            }
        });
    });

});