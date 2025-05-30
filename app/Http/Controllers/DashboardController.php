<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Turno;
use App\Models\Profesional;
use App\Models\Servicio;

class DashboardController extends Controller
{
    public function index()
{
    $cantidadClientes = Cliente::count();
    $cantidadConsultas = Consulta::count();
    $cantidadProfesionales = Profesional::count();
    $cantidadServicios = Servicio::count();
    $turnosActivos = Turno::count();

    return view('dashboard', compact(
        'cantidadClientes',
        'cantidadConsultas',
        'cantidadProfesionales',
        'cantidadServicios',
        'turnosActivos'
    ));
}
}
