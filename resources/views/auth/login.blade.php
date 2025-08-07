<body>
     <link rel="stylesheet" href="css/login.css" />
    <div class="container">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </form>
    </div>

    <!-- js -->
    <script src="js/login.js"></script>
</body>
