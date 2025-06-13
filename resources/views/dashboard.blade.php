
@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-teal text-white">
                    Panel de Usuario
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="mb-3">Hola, {{ Auth::user()->name }}!</h5>
                    <p>Bienvenido al sistema. Desde acá podés gestionar tus turnos o explorar nuestros servicios.</p>

                    <a href="{{ url('/turnos') }}" class="btn btn-outline-teal mt-3">Ver mis turnos</a>
                </div>
            </div>

<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Panel de Control</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Clientes</h2>
            <p class="text-3xl">{{ $cantidadClientes }}</p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Consultas</h2>
            <p class="text-3xl">{{ $cantidadConsultas }}</p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Profesionales</h2>
            <p class="text-3xl">{{ $cantidadProfesionales }}</p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Servicios</h2>
            <p class="text-3xl">{{ $cantidadServicios }}</p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h2 class="text-lg font-semibold">Turnos Totales</h2>
            <p class="text-3xl">{{ $turnosActivos }}</p>

        </div>
    </div>
</div>
@endsection