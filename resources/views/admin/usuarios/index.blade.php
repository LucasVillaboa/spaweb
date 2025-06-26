@extends('layouts.app')

@section('title', 'Gestionar Usuarios')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Gestión de Usuarios</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
<a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->getRoleNames()->implode(', ') }}</td>
                    <td>
                        @if($usuario->activo)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        @if($usuario->activo)
                            <form method="POST" action="{{ route('admin.usuarios.desactivar', $usuario->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger">Dar de Baja</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.usuarios.activar', $usuario->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-success">Dar de Alta</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
