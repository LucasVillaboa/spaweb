@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">Crear Nuevo Usuario</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role_id" class="form-select" required>
                <option value="">Seleccionar rol</option>
                @foreach($roles as $id => $nombre)
                    <option value="{{ $id }}">{{ ucfirst($nombre) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear Usuario</button>
    </form>
</div>
@endsection
