@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center text-teal mb-4">Contacto</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contacto.enviar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje:</label>
            <textarea name="mensaje" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-teal">Enviar</button>
    </form>
</div>
@endsection