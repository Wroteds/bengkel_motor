document.addEventListener("DOMContentLoaded", function () {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const sidebarMenu = document.getElementById("sidebarMenu");

    // toggle sidebar
    hamburgerBtn.addEventListener("click", function (e) {
        e.stopPropagation();
        sidebarMenu.classList.toggle("active");

        // toggle hamburger vs close
        if (sidebarMenu.classList.contains("active")) {
            hamburgerBtn.innerHTML = "&times;"; // ganti jadi X
        } else {
            hamburgerBtn.innerHTML = "&#9776;"; // kembali ke hamburger
        }
    });

    // klik menu -> tutup sidebar
    document.querySelectorAll(".menu-link").forEach(link => {
        link.addEventListener("click", function () {
            sidebarMenu.classList.remove("active");
            hamburgerBtn.innerHTML = "&#9776;";
        });
    });

    // klik di luar -> tutup sidebar
    document.addEventListener("click", function (e) {
        if (!sidebarMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
            sidebarMenu.classList.remove("active");
            hamburgerBtn.innerHTML = "&#9776;";
        }
    });
});
