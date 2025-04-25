@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-color: #e6f9f9; border-radius: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-teal text-white text-center fs-4">Recuperar Contraseña</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-teal">Enviar enlace de recuperación</button>
                        </div>

                        <div class="mt-3 text-center">
                            ¿Recordaste tu contraseña? <a href="{{ route('login') }}" class="text-teal fw-bold">Iniciar sesión</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
