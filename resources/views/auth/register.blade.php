<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> </head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form id="registerForm" method="POST" action="/register">
            @csrf
            <div class="input-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus />
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required />
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required />
            </div>
            <button type="submit">Register</button>
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </form>
    </div>
</body>
</html>