document.addEventListener("DOMContentLoaded", function() {
    console.log("Admin dashboard siap dipakai 🚀");

    const sidebar = document.querySelector(".sidebar");
    const menuToggle = document.querySelector(".menu-toggle");
    const closeBtn = document.querySelector(".close-btn");

    // Tangani klik tombol menu (hamburger)
    if (menuToggle) {
        menuToggle.addEventListener("click", function() {
            sidebar.classList.add("active");
        });
    }

    // Tangani klik tombol tutup (X)
    if (closeBtn) {
        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("active");
        });
    }

    // Tambahan: konfirmasi hapus
    const deleteForms = document.querySelectorAll("form button.btn-danger");
    deleteForms.forEach(button => {
        button.addEventListener("click", function(e) {
            if (!confirm("Apakah Anda yakin ingin menghapus booking ini?")) {
                e.preventDefault();
            }
        });
    });
});
