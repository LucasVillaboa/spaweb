@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-teal text-center">Panel de Administración</h2>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card border-success shadow">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-success"></i>
                    <h5 class="card-title mt-3">Clientes Registrados</h5>
                    <p class="fs-4">{{ $cantidadClientes }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <i class="bi bi-gear fs-1 text-primary"></i>
                    <h5 class="card-title mt-3">Servicios Activos</h5>
                    <p class="fs-4">{{ $cantidadServicios }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <i class="bi bi-calendar-check fs-1 text-warning"></i>
                    <h5 class="card-title mt-3">Turnos Reservados</h5>
                    <p class="fs-4">{{ $cantidadTurnos }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection