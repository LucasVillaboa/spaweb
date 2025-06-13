@extends('layouts.app')

@section('title', 'Inicio | Spa Bienestar')

@section('content')

<!-- Hero con video de fondo -->
<div class="hero position-relative text-white d-flex align-items-center justify-content-center text-center" style="height: 100vh; overflow: hidden;">
    <video autoplay muted loop playsinline class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover">
        <source src="{{ asset('videos/Spaa.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>
    
    <div class="position-relative z-1">
        <h1 class="display-4 fw-bold">Bienvenidos a Spa Natural</h1>
        
    </div>
</div>


<!-- Sección Sobre Nosotros -->
<section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="text-teal mb-4">Sobre Nosotros</h2>
        <p class="lead text-muted">
            Buscamos atraer la atención de nuestros clientes a través de experiencias inspiradas en la seducción de los sentidos.
            Adaptamos cada propuesta con el objetivo de que logres desconectarte completamente de la rutina
            y disfrutes de un momento de bienestar en total armonía con la naturaleza.
            Desde nuestros inicios, trabajamos con dedicación para brindar un servicio de calidad, combinando técnicas tradicionales con propuestas innovadoras, en un ambiente cálido y profesional. Nuestro equipo está comprometido con el bienestar físico y emocional de cada persona que nos elige.
        </p>
    </div>
</section>
<!-- Sección Servicios Destacados -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="text-teal mb-4">Nuestros Servicios</h2>
        <div class="row">
            <!-- Tarjeta 1: Masajes -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="/images/masajes.jpg" class="card-img-top" alt="Masajes Relajantes">
                    <div class="card-body">
                        <i class="bi bi-heart-pulse display-5 text-teal mb-3"></i>
                        <h5 class="card-title">Masajes Relajantes</h5>
                        <p class="card-text">Anti-estrés, descontracturantes, piedras calientes y más para tu bienestar físico y mental.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Belleza -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="/images/belleza.jpg" class="card-img-top" alt="Tratamientos de Belleza">
                    <div class="card-body">
                        <i class="bi bi-brush display-5 text-teal mb-3"></i>
                        <h5 class="card-title">Belleza y Cuidado</h5>
                        <p class="card-text">Lifting de pestañas, depilación facial, belleza de manos y pies para verte y sentirte bien.</p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Tratamientos Corporales -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="/images/corporales.jpg" class="card-img-top" alt="Tratamientos Corporales">
                    <div class="card-body">
                        <i class="bi bi-droplet-half display-5 text-teal mb-3"></i>
                        <h5 class="card-title">Tratamientos Corporales</h5>
                        <p class="card-text">Reducción de celulitis, criofrecuencia, dermohealth, ultracavitación y más técnicas innovadoras.</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('servicios') }}" class="btn btn-outline-primary mt-4">Ver todos los servicios</a>
    </div>
</section>

<!-- Llamado a la acción -->
<section class="py-5 bg-teal text-white text-center">
    <div class="container">
        <h2 class="mb-4">¿Listo para relajarte?</h2>
        <p class="lead mb-4">Reservá tu turno o escribinos para más información.</p>
        <a href="{{ route('turnos.formulario') }}" class="btn btn-light btn-lg me-3">Reservá tu turno</a>
        <a href="{{ route('contacto.formulario') }}" class="btn btn-light btn-lg me-3">Contacto</a>
       
    </div>
</section>
@endsection