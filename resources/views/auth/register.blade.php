<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css"> 
</head>
<body>
    <div class="container">
        

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Register</h2>

            <div>
                <label>Nama:</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label>Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Register</button>
            </div>

            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </form>
    </div>

    <script src="/js/login.js"></script>
</body>
</html>
