<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <h2>Reset Password</h2>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required placeholder="Masukkan email Anda">
        </div>

        <div class="form-group">
            <label>Password Baru:</label>
            <input type="password" name="password" required placeholder="Minimal 8 karakter">
        </div>

        <div class="form-group">
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" required placeholder="Ulangi password baru">
        </div>

        <button type="submit">Perbarui Password</button>

        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
    </form>
</body>
</html>
