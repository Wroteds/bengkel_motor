<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>   

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- CSS khusus halaman -->
    @stack('styles')
</head>
<body>

    {{-- NAVBAR / HEADER AKAN FULL WIDTH --}}
    @yield('navbar')

    {{-- CONTENT SAJA YANG MASUK CONTAINER --}}
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS khusus halaman -->
    @stack('scripts')
</body>
</html>
