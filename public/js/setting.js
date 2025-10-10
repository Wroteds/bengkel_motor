
    function openModal() {
        const modal = document.getElementById('modal');
        // Mengubah display dari 'none' (default di CSS baru) menjadi 'flex'
        modal.style.display = 'flex'; 
    }
    function closeModal() {
        const modal = document.getElementById('modal');
        // Mengubah display kembali ke 'none'
        modal.style.display = 'none'; 
    }
    
    // Opsional: Tutup modal jika user menekan tombol ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    // Opsional: Tutup modal jika mengklik di luar area modal
    window.onclick = function(event) {
        const modal = document.getElementById('modal');
        if (event.target == modal) {
            closeModal();
        }
    }