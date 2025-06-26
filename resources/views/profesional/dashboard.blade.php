@extends('layouts.app')

@section('title', 'Panel Profesional')

@section('content')
<div class="container py-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- TURNOS DE MAÑANA --}}
    <h2 class="mb-4 text-center text-info">Turnos del día siguiente</h2>

    @if($turnosManana->isEmpty())
        <div class="alert alert-secondary text-center">
            No tenés turnos asignados para mañana.
        </div>
    @else
        <div class="text-end mb-3">
            <button onclick="imprimirSeccion('turnos-manana')" class="btn btn-outline-secondary">Imprimir turnos de mañana</button>
        </div>

        <div id="turnos-manana">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Servicios</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($turnosManana as $turno)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}</td>
                        <td>{{ $turno->cliente->name ?? $turno->nombre ?? 'Cliente desconocido' }}</td>
                        <td>{{ $turno->servicios->pluck('nombre')->join(', ') }}</td>
                        <td>{{ $turno->comentarios ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- TURNOS PRÓXIMOS --}}
    <h2 class="mb-4 text-center text-primary">Próximos turnos asignados</h2>

    @if($turnos->isEmpty())
        <div class="alert alert-info text-center">
            No tenés turnos asignados próximos.
        </div>
    @else
        <div class="text-end mb-3">
            <button onclick="imprimirSeccion('turnos-proximos')" class="btn btn-outline-secondary">Imprimir turnos próximos</button>
        </div>

        <div id="turnos-proximos">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cliente</th>
                            <th>Servicios</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turnos as $turno)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($turno->fecha)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}</td>
                                <td>{{ $turno->cliente->name ?? $turno->nombre ?? 'Cliente desconocido' }}</td>
                                <td>
                                    @foreach($turno->servicios as $servicio)
                                        <span class="badge bg-info text-dark">{{ $servicio->nombre }}</span><br>
                                    @endforeach
                                </td>
                                <td>{{ $turno->comentarios ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <hr class="my-5">

    {{-- TURNOS HOY --}}
    <h2 class="mb-4 text-center text-success">Turnos del día</h2>

    @php
        $hoy = \Carbon\Carbon::today()->toDateString();
        $turnosHoy = \App\Models\Turno::where('profesional_id', auth()->id())
            ->where('fecha', $hoy)
            ->with('cliente', 'servicios')
            ->get();
    @endphp

    @if($turnosHoy->isEmpty())
        <div class="alert alert-secondary text-center">
            No tenés turnos asignados para hoy.
        </div>
    @else
        <div class="text-end mb-3">
            <button onclick="imprimirSeccion('turnos-hoy')" class="btn btn-outline-secondary">Imprimir turnos de hoy</button>
        </div>

        <div id="turnos-hoy">
            @foreach ($turnosHoy as $turno)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Turno - {{ $turno->fecha }} a las {{ $turno->hora }}</h5>
                        <p><strong>Cliente:</strong> {{ $turno->cliente->name ?? $turno->nombre ?? 'Cliente desconocido' }}</p>
                        <p><strong>Servicios:</strong> {{ $turno->servicios->pluck('nombre')->join(', ') }}</p>

                        {{-- Formulario para guardar historial --}}
                        <form method="POST" action="{{ route('profesional.guardarHistorial', $turno->id) }}">
                            @csrf
                            @method('PUT')
                            <label for="historial">Historial de este turno:</label>
                            <textarea name="historial" rows="3" class="form-control">{{ $turno->historial }}</textarea>
                            <button type="submit" class="btn btn-primary mt-2">Guardar historial</button>
                        </form>

                        {{-- Botón para ver historial completo --}}
                        <button type="button" class="btn btn-outline-secondary btn-sm mt-3" data-bs-toggle="collapse" data-bs-target="#historial-{{ $turno->id }}">
                            Ver historial del cliente
                        </button>

                        {{-- Historial completo --}}
                        <div class="collapse mt-2" id="historial-{{ $turno->id }}">
                            <div class="card card-body">
                            @php
    $cliente = $turno->cliente;
@endphp

@if($cliente)
    @php
        $historial = \App\Models\Turno::where('user_id', $cliente->id)
            ->where('profesional_id', auth()->id())
            ->where('fecha', '<', $hoy)
            ->orderBy('fecha', 'desc')
            ->get();
    @endphp

    @if($historial->isEmpty())
        <p>No hay historial previo para este cliente.</p>
    @else
        <ul class="list-group">
            @foreach ($historial as $h)
                <li class="list-group-item">
                    <strong>{{ \Carbon\Carbon::parse($h->fecha)->format('d/m/Y') }}</strong><br>
                    {{ $h->historial ?? 'Sin detalles registrados.' }}
                </li>
            @endforeach
        </ul>
    @endif
@else
    <p class="text-danger">No se puede mostrar historial: el cliente no está asociado al turno.</p>
@endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@push('scripts')
<script>
function imprimirSeccion(id) {
    var contenido = document.getElementById(id).innerHTML;
    var ventanaImpresion = window.open('', '', 'height=600,width=800');
    ventanaImpresion.document.write('<html><head><title>Imprimir turnos</title>');
    ventanaImpresion.document.write('</head><body>');
    ventanaImpresion.document.write(contenido);
    ventanaImpresion.document.write('</body></html>');
    ventanaImpresion.document.close();
    ventanaImpresion.print();
}
</script>
@endpush

@endsection
