<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Turno;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Servicio;

class TurnoController extends Controller
{
    public function solicitarTurno(Request $request)
{
    $user = auth()->user();

    // Validar datos de entrada
    $request->validate([
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'servicios' => 'required|array|min:1',
        'profesional_id' => 'required|exists:users,id',
        'fecha_hora' => 'required|date|after:now',
        'medio_pago' => 'required|in:debito,credito,efectivo',
        'comentarios' => 'nullable|string',
    ]);

    // Normalizar la hora (sin segundos ni microsegundos)
    $fechaHoraTurno = Carbon::parse($request->fecha_hora)->setSecond(0)->setMicrosecond(0);
    $ahora = Carbon::now();

    // Validar reserva con al menos 48 hs de anticipación
    if ($ahora->diffInHours($fechaHoraTurno, false) < 48) {
        return back()->withErrors(['fecha_hora' => 'Debés reservar el turno con al menos 48 horas de anticipación.']);
    }

    // Validar que no haya turno duplicado con mismo profesional, fecha y hora
   /*$turnoExistente = Turno::where('profesional_id', $request->profesional_id)
    ->whereDate('fecha', $fechaHoraTurno) // fecha normalizada
    ->whereTime('hora', $fechaHoraTurno)  // hora exacta sin segundos extraños
    ->exists();*/
    $fecha = $fechaHoraTurno->toDateString();      // ej: '2025-06-25'
$hora = $fechaHoraTurno->format('H:i:s');      // ej: '14:30:00'

$turnoExistente = Turno::where('profesional_id', $request->profesional_id)
    ->where('fecha', $fecha)
    ->where('hora', $hora)
    ->exists();


     if ($turnoExistente) {
    
        return redirect()->back()->withErrors([
    'fecha_hora' => 'Ya hay un turno asignado a ese profesional en la fecha y hora seleccionadas. Elegí otra.'
])->withInput();
        }


    // Calcular precios
    $precioPorServicio = 5000;
    $cantidadServicios = count($request->servicios);
    $precioTotal = $precioPorServicio * $cantidadServicios;
    $descuento = 0;

    if ($request->medio_pago === 'debito') {
        $descuento = 0.15 * $precioTotal;
    }

    $precioFinal = $precioTotal - $descuento;

    try {
        // Crear el turno
        $turno = Turno::create([
            'user_id' => $user->id,
            'cliente_id' => $user->id, // ✅ Esto es clave para que el admin lo vea bien
             'nombre' => $request->nombre,
             'email' => $user->email,
             'servicio' => json_encode($request->servicios), // ✅ Para que se vea en admin.ver

            'fecha' => $fechaHoraTurno->toDateString(),
            'hora' => $fechaHoraTurno->format('H:i:s'),
            'comentarios' => $request->comentarios,
            'profesional_id' => $request->profesional_id,
            'medio_pago' => $request->medio_pago,
            'precio_total' => $precioTotal,
            'descuento' => $descuento,
            'precio_final' => $precioFinal,
        ]);

        // Asociar servicios
        $turno->servicios()->attach($request->servicios);

        // Preparar y enviar email
        $nombresServicios = Servicio::whereIn('id', $request->servicios)->pluck('nombre')->toArray();
        $serviciosTexto = implode(', ', $nombresServicios);
        $profesional = User::find($request->profesional_id);

        $contenido = "Hola {$request->nombre},\n\n";
        $contenido .= "Gracias por reservar con *Sentirse Bien* 🧖‍♀️.\n\n";
        $contenido .= "📅 Fecha del turno: " . $fechaHoraTurno->format('d/m/Y') . "\n";
        $contenido .= "🕒 Hora: " . $fechaHoraTurno->format('H:i') . "\n";
        $contenido .= "💆 Servicios: {$serviciosTexto}\n";
        $contenido .= "👩 Profesional: {$profesional->name}\n";
        $contenido .= "💳 Medio de pago: {$request->medio_pago}\n";
        $contenido .= "💰 Total: $" . number_format($precioTotal, 2, ',', '.') . "\n";

        if ($descuento > 0) {
            $contenido .= "🎉 Descuento aplicado (15%): -$" . number_format($descuento, 2, ',', '.') . "\n";
        }

        $contenido .= "🔖 Total a pagar: $" . number_format($precioFinal, 2, ',', '.') . "\n\n";
        $contenido .= "¡Te esperamos! ✨\nSpa Sentirse Bien";

        Mail::raw($contenido, function ($message) use ($user) {
            $message->to($user->email)
                ->subject('📩 Comprobante de Turno - Sentirse Bien');
        });

        return redirect()->back()->with('success', '¡Tu turno fue solicitado con éxito! Revisa tu correo para el comprobante.');


    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error al crear el turno: ' . $e->getMessage()]);
    }
}

    // Mostrar formulario para solicitar turno
    public function mostrarFormulario()
    {
        $profesionales = User::role('profesional')->get();
        return view('cliente.turno', compact('profesionales'));
    }

    public function turnosOcupados(Request $request)
{
    $request->validate([
        'profesional_id' => 'required|exists:users,id',
        'fecha' => 'required|date'
    ]);

    $turnos = Turno::where('profesional_id', $request->profesional_id)
        ->where('fecha', $request->fecha)
        ->pluck('hora'); // solo traemos la hora

    return response()->json($turnos);
}


public function horasOcupadas(Request $request)
{
    $request->validate([
        'profesional_id' => 'required|exists:users,id',
        'fecha' => 'required|date',
    ]);

    $profesionalId = $request->input('profesional_id');
    $fecha = $request->input('fecha');

    // Obtener horas ocupadas para ese profesional y fecha
    $horas = Turno::where('profesional_id', $profesionalId)
        ->where('fecha', $fecha)
        ->pluck('hora')  // devuelve collection con los valores de columna 'hora'
        ->map(function($hora) {
            // Convertir a string formato "HH:mm:ss"
            return \Carbon\Carbon::parse($hora)->format('H:i:s');
        });

    return response()->json($horas);
}

public function adminIndex()
{
    $turnos = Turno::with(['cliente', 'profesional'])->latest()->get();

    return view('admin.turnos.index', compact('turnos'));
}


}


