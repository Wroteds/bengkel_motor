document.addEventListener("DOMContentLoaded", () => {
  const bookingForm = document.getElementById("bookingForm");

  bookingForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Tambah spinner di tombol
    const button = bookingForm.querySelector("button");
    button.innerHTML = `<span class="spinner-border spinner-border-sm"></span> Mengirim...`;
    button.disabled = true;

    setTimeout(() => {
      alert("Booking berhasil dikirim!");
      this.submit(); // tetap kirim ke backend Laravel
    }, 1500);
  });
});
