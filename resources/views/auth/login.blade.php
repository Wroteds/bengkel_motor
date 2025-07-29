<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
                <p id="errorMessage" class="error-message">
                      @error('email')
                      {{ $message }}
                      @enderror
                      @error('password')
                      {{ $message }}
                      @enderror
                      {{ session('error') }} {{-- Tambahkan ini juga jika ada error umum dari controller --}}
                </p>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">Login</button>
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </form>
    </div>
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
