@extends('layouts.app')

@section('title', 'Servicios | Spa Bienestar')

@section('content')

<section class="servicios py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-3 text-teal">Nuestros Servicios</h2>
    <p class="lead text-center text-muted mb-5">
      Experiencias diseñadas para relajar cuerpo, mente y alma.
    </p>

    <!-- Servicios Individuales -->
    <div class="mb-4">
      <h4 class="text-teal">Servicios Individuales</h4>
      <p class="text-muted">Propuestas personalizadas para tu cuidado y bienestar.</p>
    </div>

    <!-- Primera fila de servicios individuales -->
    <div class="row">
      <!-- Masajes -->
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow">
          <img src="/images/masajes.jpg" class="card-img-top" alt="Masajes Relajantes">
          <div class="card-body text-center">
            <i class="bi bi-heart-pulse fs-1 text-teal mb-3"></i>
            <h5 class="card-title">Masajes Relajantes</h5>
            <p class="card-text">Anti-estrés, descontracturantes, piedras calientes y más para tu bienestar físico y mental.</p>
            <p class="card-text">$7.000,00</p>
          </div>
        </div>
      </div>

      <!-- Belleza -->
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow">
          <img src="/images/belleza.jpg" class="card-img-top" alt="Tratamientos de Belleza">
          <div class="card-body text-center">
            <i class="bi bi-brush fs-1 text-teal mb-3"></i>
            <h5 class="card-title">Belleza y Cuidado</h5>
            <p class="card-text">Lifting de pestañas, depilación facial, belleza de manos y pies para verte y sentirte bien.</p>
            <p class="card-text">$6.500,00</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Segunda fila de servicios individuales -->
    <div class="row">
      <!-- Corporales -->
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow">
          <img src="/images/corporales.jpg" class="card-img-top" alt="Tratamientos Corporales">
          <div class="card-body text-center">
            <i class="bi bi-droplet-half fs-1 text-teal mb-3"></i>
            <h5 class="card-title">Tratamientos Corporales</h5>
            <p class="card-text">Reducción de celulitis, criofrecuencia, dermohealth, ultracavitación y más técnicas innovadoras.</p>
            <p class="card-text">$9.000,00</p>
          </div>
        </div>
      </div>

      <!-- Faciales -->
      <div class="col-md-6 mb-4">
        <div class="card h-100 shadow">
          <img src="/images/faciales.jpg" class="card-img-top" alt="Tratamientos Faciales">
          <div class="card-body text-center">
            <i class="bi bi-emoji-smile fs-1 text-teal mb-3"></i>
            <h5 class="card-title">Tratamientos Faciales</h5>
            <p class="card-text">Mejorá el aspecto y la salud de tu piel con tecnología avanzada.</p>
            <p class="card-text">$8.500,00</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Servicios Grupales -->
    <div class="mt-5 mb-4">
      <h4 class="text-teal">Servicios Grupales</h4>
      <p class="text-muted">Ideal para compartir un momento de bienestar con otros.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card h-100 shadow">
          <img src="/images/grupales.jpg" class="card-img-top" alt="Servicios Grupales">
          <div class="card-body text-center">
            <i class="bi bi-people fs-1 text-teal mb-3"></i>
            <h5 class="card-title">Servicios Grupales</h5>
            <p class="card-text">Disfrutá de yoga e hidromasajes en grupo, conectando cuerpo y mente.</p>
            <p class="card-text">$10.000,00</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Llamado a la acción -->
<section class="py-5 bg-teal text-white text-center">
    <div class="container">
        <h2 class="mb-4">¿Listo para relajarte?</h2>
        <p class="lead mb-4">Reservá tu visita o escribinos para más información.</p>
        <a href="{{ route('turnos.formulario') }}" class="btn btn-light btn-lg me-3">Reservá tu turno</a>
        <a href="{{ route('contacto.formulario') }}" class="btn btn-light btn-lg me-3">Contacto</a>
        
    </div>
</section>
@endsection