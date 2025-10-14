<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2>Lupa Password</h2>

        @if (session('status'))
            <div style="color: lime;">{{ session('status') }}</div>
        @endif

        <div class="form-group">
            <label for="email">Masukkan Email Anda:</label>
            <input type="email" name="email" id="email" required placeholder="Email terdaftar">
        </div>

        <button type="submit">Kirim Link Reset</button>

        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
    </form>
</body>
</html>
