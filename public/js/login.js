document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const errorMessage = document.getElementById('errorMessage');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form untuk refresh halaman

        const username = usernameInput.value;
        const password = passwordInput.value;

        // Contoh validasi sederhana
        if (username === 'user' && password === 'password123') {
            errorMessage.textContent = ''; // Hapus pesan error jika berhasil
            alert('Login Berhasil!');
            // Anda bisa mengarahkan user ke halaman lain di sini
            // window.location.href = 'dashboard.html';
        } else {
            errorMessage.textContent = 'Username atau password salah. Silakan coba lagi.';
        }
    });
});