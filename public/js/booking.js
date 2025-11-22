document.addEventListener("DOMContentLoaded", () => {

    // ============================
    // HANDLE POPUP LIMIT
    // ============================
    const popupLimit = document.getElementById("popupLimit");
    const popupSuccess = document.getElementById("popupSuccess");

    // Tombol popup LIMIT
    window.closePopup = () => {
        if (popupLimit) popupLimit.style.display = "none";
    };

    // Tombol popup SUCCESS
    window.closePopupSuccess = () => {
        if (popupSuccess) popupSuccess.style.display = "none";
    };

    // ============================
    // FORM BOOKING SPINNER
    // ============================
    const bookingForm = document.getElementById("bookingForm");

    if (bookingForm) {
        bookingForm.addEventListener("submit", function (e) {
            // Kalau popup LIMIT muncul, form JANGAN diproses
            if (popupLimit) {
                e.preventDefault();
                return;
            }

            // Spinner
            const button = bookingForm.querySelector("button");
            button.innerHTML = `<span class="spinner-border spinner-border-sm"></span> Mengirim...`;
            button.disabled = true;
        });
    }
});
