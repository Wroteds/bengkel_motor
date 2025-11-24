document.addEventListener('DOMContentLoaded', function() {

    /* --- 1. Menghilangkan Notifikasi Setelah 5 Detik --- */
    const alerts = document.querySelectorAll('.fixed-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';

            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });


    /* --- 2. Hover Effect Baris Tabel --- */
    const rows = document.querySelectorAll('.booking-table tbody tr');

    rows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.backgroundColor = '#e9f5ff';
        });

        row.addEventListener('mouseleave', () => {
            row.style.backgroundColor = '';
        });
    });


    /* --- 3. Konfirmasi Hapus --- */
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const confirmDelete = confirm(
                'Apakah Anda yakin ingin menghapus booking ini? Tindakan ini tidak dapat dibatalkan.'
            );

            if (!confirmDelete) {
                e.preventDefault();
            }
        });
    });

});
