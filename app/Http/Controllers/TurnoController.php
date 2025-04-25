<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function mostrarFormulario()
    {
        
        $turnos = Turno::where('user_id', Auth::id())->get();
    
        return view('turnos', compact('turnos'));
    }
    public function enviarFormulario(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'fecha' => 'required|date',
        'hora' => 'required',
        'servicio' => 'required|string|max:255',
    ]);

    Turno::create([
        'user_id' => Auth::id(), // Esto relaciona el turno con el usuario logueado
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'servicio' => $request->servicio,
    ]);

    return redirect()->route('turnos.formulario')->with('success', '¡Turno solicitado correctamente!');
    }
    public function adminIndex()
{
    $turnos = \App\Models\Turno::latest()->paginate(10);
    return view('admin.turnos', compact('turnos'));
}
}