@extends('layouts.app')

@section('title', 'Editar Turno')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center text-primary">Editar Turno</h2>

    <form method="POST" action="{{ route('admin.turnos.actualizar', $turno->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Cliente --}}
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-select" required>
                <option value="">Seleccioná un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $turno->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->name }} ({{ $cliente->email }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Profesional --}}
        <div class="mb-3">
            <label for="profesional_id" class="form-label">Profesional</label>
            <select name="profesional_id" id="profesional_id" class="form-select" required>
                <option value="">Seleccioná un profesional</option>
                @foreach($profesionales as $profesional)
                    <option value="{{ $profesional->id }}" {{ $turno->profesional_id == $profesional->id ? 'selected' : '' }}>
                        {{ $profesional->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Servicios --}}
        <div class="mb-3">
            <label for="servicios" class="form-label">Servicios</label>
            @php
                $serviciosSeleccionados = json_decode($turno->servicio, true) ?? [];
            @endphp
            <div class="form-check">
                @foreach($servicios as $servicio)
                    <div>
                        <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}"
                            {{ in_array($servicio->id, $serviciosSeleccionados) ? 'checked' : '' }}
                            class="form-check-input" id="servicio-{{ $servicio->id }}">
                        <label class="form-check-label" for="servicio-{{ $servicio->id }}">
                            {{ $servicio->nombre }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Fecha --}}
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control"
                value="{{ $turno->fecha }}" required>
        </div>

        {{-- Hora --}}
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control"
                value="{{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}" required>
        </div>

        {{-- Medio de pago --}}
        <div class="mb-3">
            <label for="medio_pago" class="form-label">Medio de pago</label>
            <select name="medio_pago" id="medio_pago" class="form-select" required>
                <option value="efectivo" {{ $turno->medio_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="debito" {{ $turno->medio_pago == 'debito' ? 'selected' : '' }}>Tarjeta de Débito</option>
                <option value="credito" {{ $turno->medio_pago == 'credito' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                <option value="no especificado" {{ $turno->medio_pago == 'no especificado' ? 'selected' : '' }}>No especificado</option>
            </select>
        </div>

        {{-- Botón --}}
        <div class="text-end">
            <button type="submit" class="btn btn-success">Actualizar Turno</button>
            <a href="{{ route('admin.turnos') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
