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
        <h1 class="display-4 fw-bold">Bienvenidos a Spa Sentirse Bien</h1>
        
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

<!-- Sección Nuestro Equipo -->
<section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="text-teal mb-4">Nuestro Equipo</h2>
        <p class="lead text-muted mb-5">Profesionales comprometidos con tu bienestar físico y emocional.</p>
        <div class="row justify-content-center">
        <!--<div class="row"> -->
            <!-- Lic. Juan Perez -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="/images/equipo/juan.jpg" class="card-img-top" alt="Lic. Juan Perez">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Juan Perez</h5>
                        <p class="card-text text-muted">Especialista en masoterapia y técnicas orientales. 10 años ayudando a mejorar la calidad de vida de nuestros clientes.</p>
                    </div>
                </div>
            </div>

            <!-- Lic. Martín Rios -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="/images/equipo/martin.jpg" class="card-img-top" alt="Lic. Martín Rios">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Martín Rios</h5>
                        <p class="card-text text-muted">Experto en tratamientos corporales y estéticos. Con enfoque en innovación y resultados visibles.</p>
                    </div>
                </div>
            </div>

            <!-- Lic. Julia Perez -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="/images/equipo/julia.jpg" class="card-img-top" alt="Lic. Julia Perez">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Julia Perez</h5>
                        <p class="card-text text-muted">Terapista integral. Especializada en técnicas de relajación profunda y bienestar emocional.</p>
                    </div>
                </div>
            </div>
  


            <!-- Dra. Ana Felicidad 
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow border-0">
                    <img src="/images/equipo/ana.jpg" class="card-img-top" alt="Dra. Ana Felicidad">
                    <div class="card-body">
                        <h5 class="card-title">Dra. Ana Felicidad</h5>
                        <p class="card-text text-muted">Directora general. Referente en medicina estética y promotora del equilibrio cuerpo-mente.</p>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
</section>        
 

<!-- Llamado a la acción -->
<section class="py-5 bg-teal text-white text-center">
    <div class="container">
        <h2 class="mb-4">¿Listo para relajarte?</h2>
        <p class="lead mb-4">Reservá tu turno o escribinos para más información.</p>

@auth
    @if(Auth::user()->hasRole('cliente'))
        <a href="{{ route('cliente.dashboard') }}" class="btn btn-light btn-lg me-3">Reservá tu turno</a>
    @endif
@else
    <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3">Registrate para reservar</a>
@endauth



        <!--<a href="{{ route('contacto.formulario') }}" class="btn btn-light btn-lg me-3">Contacto</a>-->
    </div>
</section>


<!-- Botón flotante para abrir/cerrar chat -->
<button id="chatToggle" 
    style="position: fixed; bottom: 20px; right: 20px; z-index: 10000; background:#008080; color:#fff; border:none; border-radius:50%; width:60px; height:60px; font-size:30px; cursor:pointer;">
    💬
</button>

<!-- Iframe del chatbot, oculto por defecto -->
<iframe 
  id="chatIframe"
  src="https://www.chatbase.co/chatbot-iframe/kgkINcQ2IAbqrrtt2RaIV"
  style="position: fixed; bottom: 90px; right: 20px; width: 350px; height: 500px; border: none; z-index: 9999; display: none;">
</iframe>

@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chatToggle');
    const chatIframe = document.getElementById('chatIframe');

    chatToggle.addEventListener('click', () => {
      if (chatIframe.style.display === 'none' || chatIframe.style.display === '') {
        chatIframe.style.display = 'block';
        chatToggle.textContent = '❌';  // Cambia icono al abrir
      } else {
        chatIframe.style.display = 'none';
        chatToggle.textContent = '💬';  // Cambia icono al cerrar
      }
    });
  });
</script>
@endsection








