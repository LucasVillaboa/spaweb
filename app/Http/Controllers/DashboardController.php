<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Turno;
use App\Models\Profesional;
use App\Models\Servicio;
use App\Models\User;

class DashboardController extends Controller
{
  public function index()
{
    $user = Auth::user();

    $cantidadClientes = User::where('role', 'cliente')->count();
    $cantidadProfesionales = User::where('role', 'profesional')->count();
    $cantidadServicios = Servicio::count();
    $turnosActivos = Turno::count();
    $cantidadConsultas = 0; // Podés modificar si tenés consultas por otro lado

    return view('dashboard', compact(
        'user',
        'cantidadClientes',
        'cantidadProfesionales',
        'cantidadServicios',
        'turnosActivos',
        'cantidadConsultas'
    ));
}

public function clienteDashboard()
{
    $servicios = Servicio::all(); // <-- importante
    $profesionales = User::role('profesional')->get();

    return view('cliente.dashboard', compact('servicios', 'profesionales'));
}




}

