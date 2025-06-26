<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Servicio;
use App\Models\Turno;
use Carbon\Carbon;

class AdminTurnoController extends Controller
{
    // Muestra el formulario de creación de turnos
    public function crear()
    {
        $clientes = User::role('cliente')->get();
        $profesionales = User::role('profesional')->get();
        $servicios = Servicio::all();

        return view('admin.turnos.crear', compact('clientes', 'profesionales', 'servicios'));
    }

    // Guarda el turno cargado por el administrador
    public function guardar(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:users,id',
            'profesional_id' => 'required|exists:users,id',
            'servicios' => 'required|array',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        $cliente = User::find($request->cliente_id);

        $turno = new Turno();
        $turno->cliente_id = $request->cliente_id;
        $turno->user_id = $request->cliente_id;
        $turno->profesional_id = $request->profesional_id;
        //$turno->servicio = json_encode($request->servicios);
        $turno->fecha = $request->fecha;
        $turno->hora = $request->hora;
        $turno->estado = 'pendiente';

        // Rellenamos los campos obligatorios en la tabla turnos
        $turno->nombre = $cliente->name;
        $turno->email = $cliente->email;
       

        //$turno->apellido = $cliente->apellido ?? ''; // si no tenés ese campo en users, esto evita errores


        $turno->medio_pago = 'no especificado'; // o 'efectivo', 'online', etc., según tu sistema


        $turno->save();

        $turno->servicios()->sync($request->servicios);

        return redirect()->route('admin.panel')->with('success', 'Turno creado correctamente');
    }

    // Muestra el formulario de edición de un turno existente
public function editar($id)
{
    $turno = Turno::findOrFail($id);
    $clientes = User::role('cliente')->get();
    $profesionales = User::role('profesional')->get();
    $servicios = Servicio::all();

    return view('admin.turnos.editar', compact('turno', 'clientes', 'profesionales', 'servicios'));
}

// Actualiza el turno editado
public function actualizar(Request $request, $id)
{
    $request->validate([
        'cliente_id' => 'required|exists:users,id',
        'profesional_id' => 'required|exists:users,id',
        'servicios' => 'required|array|min:1',
        'fecha' => 'required|date',
        'hora' => 'required',
        'medio_pago' => 'required|string',
    ]);

    $turno = Turno::findOrFail($id);
    $cliente = User::find($request->cliente_id);

    $turno->update([
        'cliente_id' => $request->cliente_id,
        'user_id' => $request->cliente_id,
        'profesional_id' => $request->profesional_id,
        'servicio' => json_encode($request->servicios),
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'medio_pago' => $request->medio_pago,
        'nombre' => $cliente->name,
        'email' => $cliente->email,
    ]);

    $turno->servicios()->sync($request->servicios);

    return redirect()->route('admin.turnos')->with('success', 'Turno actualizado correctamente.');
}

// Elimina un turno
public function eliminar($id)
{
    $turno = Turno::findOrFail($id);
    $turno->delete();

    return redirect()->route('admin.turnos')->with('success', 'Turno eliminado correctamente.');
}

}
