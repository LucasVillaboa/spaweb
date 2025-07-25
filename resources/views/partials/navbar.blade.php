<nav class="navbar navbar-expand-lg bg-teal navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Spa Sentirse Bien</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('servicios') ? 'active' : '' }}" href="{{ route('servicios') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sedes') ? 'active' : '' }}" href="{{ route('sedes') }}">Sedes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('turnos') ? 'active' : '' }}" href="{{ route('cliente.dashboard') }}">Turnos</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="d-flex">
                    @auth
                        @php
                            $role = Auth::user()->role;
                        @endphp

                        @if ($role === 'admin')
                            <a href="{{ route('admin.panel') }}" class="btn btn-light me-2">Panel</a>
                        @elseif ($role === 'profesional')
                            <a href="{{ route('profesional.dashboard') }}" class="btn btn-light me-2">Panel</a>
                        @else
                            <a href="{{ route('cliente.dashboard') }}" class="btn btn-light me-2">Panel</a>
                        @endif

                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.turnos') }}" class="btn btn-outline-light me-2">Turnos Admin</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Cerrar Sesión</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-light">Registrarme</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

{{-- Script para cerrar el navbar automáticamente en mobile --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('#navbarNav');
        const collapseInstance = new bootstrap.Collapse(navbarCollapse, { toggle: false });

        document.querySelectorAll('#navbarNav .nav-link, #navbarNav form button, #navbarNav .btn').forEach(function (el) {
            el.addEventListener('click', function () {
                // Solo cerrar si está visible (es decir, mobile abierto)
                if (window.getComputedStyle(navbarToggler).display !== 'none') {
                    collapseInstance.hide();
                }
            });
        });
    });
</script>

