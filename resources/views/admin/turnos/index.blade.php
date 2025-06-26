@extends('layouts.app')

@section('title', 'Turnos Registrados')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Turnos Registrados</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($turnos->isEmpty())
        <div class="alert alert-info text-center">
            No hay turnos registrados.
        </div>
    @else
        <div class="text-end mb-3">
            <button onclick="imprimirSeccion('tabla-turnos')" class="btn btn-outline-secondary">
                Imprimir turnos
            </button>
        </div>

        <div id="tabla-turnos">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Cliente</th>
                            <th>Profesional</th>
                            <th>Servicios</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turnos as $turno)
                            <tr>
                                <td>{{ $turno->cliente->name ?? '—' }}</td>
                                <td>{{ $turno->profesional->name ?? '—' }}</td>
                                <td>
                                    @if($turno->servicios && $turno->servicios->count())
                                        <ul class="mb-0">
                                            @foreach($turno->servicios as $servicio)
                                                <li>{{ $servicio->nombre }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <em class="text-muted">Sin servicios</em>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($turno->fecha)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}</td>
                                <td>{{ ucfirst($turno->estado ?? 'pendiente') }}</td>
                                <td>
                                    <a href="{{ route('admin.turnos.editar', $turno->id) }}" class="btn btn-sm btn-primary mb-1">Editar</a>

                                    <form action="{{ url('/admin/turnos/' . $turno->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
function imprimirSeccion(id) {
    var contenido = document.getElementById(id).innerHTML;
    var ventanaImpresion = window.open('', '', 'height=600,width=800');
    ventanaImpresion.document.write('<html><head><title>Listado de Turnos</title>');
    ventanaImpresion.document.write('</head><body>');
    ventanaImpresion.document.write('<h2 style="text-align:center;">Listado de Turnos</h2><hr>');
    ventanaImpresion.document.write(contenido);
    ventanaImpresion.document.write('</body></html>');
    ventanaImpresion.document.close();
    ventanaImpresion.print();
}
</script>
@endpush

@endsection

