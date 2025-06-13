@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Consultas recibidas</h2>

    @if ($consultas->count())
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->nombre }}</td>
                            <td>{{ $consulta->email }}</td>
                            <td>{{ $consulta->mensaje }}</td>
                            <td>{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $consultas->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No se han recibido consultas todavía.
        </div>
    @endif
</div>
@endsection