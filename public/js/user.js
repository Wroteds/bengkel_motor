document.addEventListener("DOMContentLoaded", function () {

    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const sidebarMenu = document.getElementById("sidebarMenu");

    // HAMBURGER SYSTEM
    if (hamburgerBtn && sidebarMenu) {

        hamburgerBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            sidebarMenu.classList.toggle("active");

            hamburgerBtn.style.display =
                sidebarMenu.classList.contains("active") ? "none" : "block";
        });

        document.querySelectorAll(".menu-link").forEach(link => {
            link.addEventListener("click", () => {
                sidebarMenu.classList.remove("active");
                hamburgerBtn.style.display = "block";
            });
        });

        document.addEventListener("click", function (e) {
            if (!sidebarMenu.contains(e.target)) {
                sidebarMenu.classList.remove("active");
                hamburgerBtn.style.display = "block";
            }
        });
    }

    // SLIDER
    const track = document.querySelector(".layanan-track");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    if (track && nextBtn && prevBtn) {

        nextBtn.addEventListener("click", () => {
            track.scrollBy({ left: 300, behavior: "smooth" });
        });

        prevBtn.addEventListener("click", () => {
            track.scrollBy({ left: -300, behavior: "smooth" });
        });
    }
});
