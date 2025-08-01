<nav class="navbar navbar-expand-lg bg-teal navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Spa Sentirse Bien</a>

        <button class="navbar-toggler" type="button" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
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
                            $user = Auth::user();
                        @endphp

                        @if ($user->hasRole('admin'))
                            <a href="{{ route('admin.panel') }}" class="btn btn-light me-2">Panel</a>
                        @elseif ($user->hasRole('profesional'))
                            <a href="{{ route('profesional.dashboard') }}" class="btn btn-light me-2">Panel</a>
                        @else
                            <a href="{{ route('cliente.dashboard') }}" class="btn btn-light me-2">Panel</a>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.getElementById('navbarNav');

        // Alternar apertura/cierre al hacer clic en el botón hamburguesa
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('click', function () {
                navbarCollapse.classList.toggle('show');
            });

            // Cerrar el menú si se hace clic en un enlace o botón dentro del navbar
            navbarCollapse.querySelectorAll('a, button').forEach(function (element) {
                element.addEventListener('click', function () {
                    const isTogglerVisible = window.getComputedStyle(navbarToggler).display !== 'none';
                    if (isTogglerVisible && navbarCollapse.classList.contains('show')) {
                        navbarCollapse.classList.remove('show');
                    }
                });
            });
        }
    });
</script>





