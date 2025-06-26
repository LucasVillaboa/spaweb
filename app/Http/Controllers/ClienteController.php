<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use App\Models\User;

class ClienteController extends Controller
{
   public function panel()
{
    $servicios = Servicio::all();
    $profesionales = User::role('profesional')->get();

    return view('cliente.dashboard', compact('servicios', 'profesionales'));
}
}
