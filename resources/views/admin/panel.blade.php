@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-teal text-center">Panel de Administración</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Estadísticas generales --}}
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Usuarios registrados</h5>
                    <p class="fs-3">{{ $cantidadClientes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Servicios activos</h5>
                    <p class="fs-3">{{ $cantidadServicios }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Turnos totales</h5>
                    <p class="fs-3">{{ $cantidadTurnos }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Acciones rápidas --}}
    <h4 class="text-center mt-5">Acciones rápidas</h4>
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-3">

        {{-- Servicios --}}
        <a href="{{ route('admin.servicios.index') }}" class="btn btn-outline-success">
            🛠️ Gestionar Servicios
        </a>
        <a href="{{ route('admin.servicios.create') }}" class="btn btn-outline-success">
            ➕ Crear Servicio
        </a>



        {{-- Turnos --}}
               <a href="{{ route('admin.turnos.crear') }}" class="btn btn-outline-primary">
     📅 Crear Turno
</a>
        <a href="{{ route('admin.turnos') }}" class="btn btn-outline-primary">
            📅 Ver Turnos
        </a>

        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-warning">Gestionar Usuarios</a>


        {{-- Próximos módulos --}}
        {{-- <a href="{{ route('admin.turnos.create') }}" class="btn btn-outline-success">➕ Crear Turno</a> --}}
        {{-- <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-dark">👥 Gestionar Usuarios</a> --}}
        {{-- <a href="{{ route('admin.reportes.servicios') }}" class="btn btn-outline-info">📊 Reporte por Servicio</a> --}}
        {{-- <a href="{{ route('admin.reportes.profesionales') }}" class="btn btn-outline-info">📊 Reporte por Profesional</a> --}}
    </div>
</div>
@endsection
