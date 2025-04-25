@extends('layouts.app')

@section('content')
<div class="container py-5" style="background-color: #e6f9f9; border-radius: 15px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-teal text-white text-center fs-4">Iniciar Sesión</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-teal">Iniciar Sesión</button>
                        </div>

                        <div class="mt-3 text-center">
                            ¿No tenés cuenta? <a href="{{ route('register') }}" class="text-teal fw-bold">Registrate</a>
                        </div>

                        <div class="mt-2 text-center">
                            <a href="{{ route('password.request') }}" class="text-muted small">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection