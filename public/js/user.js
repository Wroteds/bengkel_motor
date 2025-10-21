document.addEventListener("DOMContentLoaded", function () {
    // HAMBURGER TOGGLE 
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const sidebarMenu = document.getElementById("sidebarMenu");

    if (hamburgerBtn && sidebarMenu) {
        hamburgerBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            sidebarMenu.classList.toggle("active");

            hamburgerBtn.innerHTML = sidebarMenu.classList.contains("active")
                ? "&times;"
                : "&#9776;";
        });

        document.querySelectorAll(".menu-link").forEach(link => {
            link.addEventListener("click", function () {
                sidebarMenu.classList.remove("active");
                hamburgerBtn.innerHTML = "&#9776;";
            });
        });

        document.addEventListener("click", function (e) {
            if (!sidebarMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
                sidebarMenu.classList.remove("active");
                hamburgerBtn.innerHTML = "&#9776;";
            }
        });
    }

    // SLIDER LAYANAN 
    const track = document.querySelector(".layanan-track");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    if (track && nextBtn && prevBtn) {
        const scrollAmount = track.offsetWidth - 50;

        nextBtn.addEventListener("click", () => {
            track.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });

        prevBtn.addEventListener("click", () => {
            track.scrollBy({ left: -scrollAmount, behavior: "smooth" });
        });
    }
});
