<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Penting agar @csrf bekerja --}}
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #e6ffe6;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: auto;
            border: 1px solid #28a745;
        }

        h1 {
            color: #28a745;
        }

        p {
            color: #333;
        }

        .logout-form {
            margin-top: 20px;
        }

        .logout-form button {
            padding: 10px 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-form button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Dashboard Admin, {{ Auth::user()->name }}!</h1>
        <p>Ini adalah halaman khusus untuk administrator. Anda memiliki akses penuh.</p>
        <p>Di sini Anda bisa mengelola pengguna, layanan, laporan, dll.</p>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
