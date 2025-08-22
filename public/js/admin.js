document.addEventListener("DOMContentLoaded", function() {
    console.log("Admin dashboard siap dipakai 🚀");

    // konfirmasi hapus lebih elegan (bisa pakai alert bawaan dulu)
    const deleteForms = document.querySelectorAll("form button.btn-danger");
    deleteForms.forEach(button => {
        button.addEventListener("click", function(e) {
            if (!confirm("Apakah Anda yakin ingin menghapus booking ini?")) {
                e.preventDefault();
            }
        });
    });
});
