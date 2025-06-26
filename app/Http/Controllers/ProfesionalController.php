<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use Carbon\Carbon;

class ProfesionalController extends Controller
{

    public function dashboard()
{
    $profesionalId = auth()->id();

    $turnos = Turno::with('cliente', 'servicios')
        ->where('profesional_id', $profesionalId)
        ->whereDate('fecha', '>=', now()->toDateString())
        ->orderBy('fecha')
        ->orderBy('hora')
        ->get();

    $manana = Carbon::tomorrow()->toDateString();

    $turnosManana = Turno::with('cliente', 'servicios')
        ->where('profesional_id', $profesionalId)
        ->where('fecha', $manana)
        ->orderBy('hora')
        ->get();

    return view('profesional.dashboard', compact('turnos', 'turnosManana'));
}


    public function guardarHistorial(Request $request, $id)
{
    $turno = Turno::where('id', $id)
        ->where('profesional_id', auth()->id())
        ->firstOrFail();

    $turno->historial = $request->historial;
    $turno->save();

    return back()->with('success', 'Historial guardado correctamente.');
}

}

