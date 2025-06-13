<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        // Filtramos las consultas para que solo vean las que les pertenecen
        $consultas = Consulta::orderBy('created_at', 'desc')->paginate(10);
    
        // Devolvemos la vista con las consultas del usuario
        return view('consultas.index', compact('consultas'));
    }
}

