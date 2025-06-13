<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicio;
use App\Models\Turno;

class PanelController extends Controller
{
    public function index()
    {
        $cantidadClientes = User::count();
        $cantidadServicios = Servicio::count();
        $cantidadTurnos = Turno::count();

        return view('admin.panel', compact('cantidadClientes', 'cantidadServicios', 'cantidadTurnos'));
    }
}
