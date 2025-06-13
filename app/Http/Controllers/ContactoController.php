<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ContactoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('contacto');
    }

    public function enviarFormulario(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        // Guardar en la base de datos
        Consulta::create($request->only('nombre', 'email', 'mensaje'));

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Gracias por tu consulta. Te responderemos a la brevedad.');
    }

    public function verConsultas()
    {
        $consultas = Consulta::latest()->get();
        return view('admin.consultas.index', compact('consultas'));
    }
}