@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Gestión de Servicios</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('admin.servicios.create') }}" class="btn btn-success">Crear nuevo servicio</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($servicios as $servicio)
                    <tr>
                        <td>{{ $servicio->id }}</td>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->descripcion }}</td>
                        <td>${{ number_format($servicio->precio, 2) }}</td>
                        <td>
                            <a href="{{ route('admin.servicios.edit', $servicio->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.servicios.destroy', $servicio->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">No hay servicios cargados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection