<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'Spa Sentirse Bien')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Choices.js CSS (para que cargue rápido en head, es opcional, también puede ir en body) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <!-- Vite (Tailwind + app.css) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />-->
     <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" />

    <!-- CSS Personalizado -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Inputmask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.8/inputmask.min.js"></script>
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS Bundle (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Choices.js JS (debe ir antes de scripts personalizados para que esté disponible Choices) -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Aquí cargamos los scripts personalizados de las vistas que usen @push('scripts') -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/card@2.5.0/lib/card.css" />
<script src="https://cdn.jsdelivr.net/npm/card@2.5.0/lib/card.js"></script>


<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
