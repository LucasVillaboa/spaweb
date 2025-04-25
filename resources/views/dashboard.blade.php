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
        </div>
    </div>
</div>
@endsection