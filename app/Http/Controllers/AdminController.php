<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Turno;

class AdminController extends Controller
{
    public function panel()
    {
        $cantidadClientes = User::count();
        $cantidadServicios = Servicio::count();
        $cantidadTurnos = Turno::count();

        return view('admin.panel', compact('cantidadClientes', 'cantidadServicios', 'cantidadTurnos'));
    }

    // Elimina un turno
public function eliminar($id)
{
    $turno = Turno::findOrFail($id);
    $turno->delete();

    return redirect()->route('admin.turnos')->with('success', 'Turno eliminado correctamente.');
}
}