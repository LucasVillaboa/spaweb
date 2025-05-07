<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Archivos generados por Vite (NO usar @vite si estás en producción sin Vite funcionando) -->
    <link rel="stylesheet" href="{{ secure_asset('build/assets/app-DMbANx5E.css') }}">
    <script type="module" src="{{ secure_asset('build/assets/app-Cpy3QB8B.js') }}"></script>

    <title>Spa Natural</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    {{-- Navbar (si tenés un partial separado, descomentá esta línea) --}}
    {{-- @include('partials.navbar') --}}

    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer (si tenés un partial separado, descomentá esta línea) --}}
    {{-- @include('partials.footer') --}}

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>