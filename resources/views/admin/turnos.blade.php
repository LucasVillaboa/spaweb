@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Turnos recibidos</h1>

    @if($turnos->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mensaje</th>
                    <th>Fecha de solicitud</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($turnos as $turno)
                    <tr>
                        <td>{{ $turno->nombre }}</td>
                        <td>{{ $turno->email }}</td>
                        <td>{{ $turno->telefono }}</td>
                        <td>{{ $turno->fecha }}</td>
                        <td>{{ $turno->hora }}</td>
                        <td>{{ $turno->mensaje }}</td>
                        <td>{{ $turno->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $turnos->links() }}
    @else
        <p>No hay turnos registrados aún.</p>
    @endif
</div>
@endsection