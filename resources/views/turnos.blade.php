@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center text-teal mb-4">Solicitar Turno</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('turnos.enviar') }}" method="POST" class="mx-auto" style="max-width: 600px;">
        @csrf

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Teléfono -->
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" required>
        </div>

        <!-- Servicio -->
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <select name="servicio" id="servicio" class="form-select" required>
                <option value="">Seleccioná un servicio</option>
                <option value="Masajes">Masajes</option>
                <option value="Faciales">Faciales</option>
                <option value="Belleza">Belleza</option>
                <option value="Corporales">Tratamientos Corporales</option>
                <option value="Grupales">Servicios Grupales</option>
            </select>
        </div>

        <!-- Fecha -->
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha del Turno</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <!-- Comentarios -->
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios (opcional)</label>
            <textarea name="comentarios" id="comentarios" class="form-control" rows="3"></textarea>
        </div>

        <!-- Botón -->
        <div class="text-center">
            <button type="submit" class="btn btn-teal px-4">Solicitar</button>
        </div>
        <div class="mt-5 p-4 bg-light border rounded text-center shadow-sm">
    <h5 class="mb-3">¿Preferís pedir tu turno por WhatsApp?</h5>
    <p class="mb-4">También podés enviar un mensaje al siguiente número y coordinar tu turno de forma rápida:</p>
    <a href="https://wa.me/5493624123456?text=Hola%2C%20quiero%20un%20turno%20para..."
       target="_blank" class="btn btn-success btn-lg">
        <i class="bi bi-whatsapp me-2"></i> Pedir turno por WhatsApp
    </a>
</div>
    </form>
</div>
@endsection
