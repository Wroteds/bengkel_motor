<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2>

        {{-- Error message --}}
        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required placeholder="Masukkan email Anda">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required placeholder="Masukkan password">
        </div>

        <button type="submit">Login</button>

        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>

        {{-- 🔹 Link Lupa Password --}}
        <p class="forgot-password">
            <a href="{{ route('password.request') }}">Lupa Password?</a>
        </p>
    </form>
</body>
</html>
