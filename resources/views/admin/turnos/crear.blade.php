@extends('layouts.app')

@section('title', 'Crear Turno')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Crear Nuevo Turno</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.turnos.guardar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id" required>
                <option value="">Seleccioná un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }} ({{ $cliente->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="profesional_id" class="form-label">Profesional</label>
            <select class="form-select" name="profesional_id" required>
                <option value="">Seleccioná un profesional</option>
                @foreach($profesionales as $profesional)
                    <option value="{{ $profesional->id }}">{{ $profesional->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="servicios" class="form-label">Servicios</label>
            <select id="servicios" class="form-select" name="servicios[]" multiple required>
    @foreach($servicios as $servicio)
        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
    @endforeach
</select>

            <small class="form-text text-muted">Podés seleccionar más de uno.</small>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Turno</button>
        <a href="{{ route('admin.panel') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const servicioSelect = document.getElementById('servicios');
        if (servicioSelect) {
            new Choices(servicioSelect, {
                removeItemButton: true,
                placeholderValue: 'Seleccioná uno o más servicios',
                searchEnabled: true,
            });
        }
    });
</script>

@endsection
