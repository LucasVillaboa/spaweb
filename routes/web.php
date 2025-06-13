<?php

use App\Http\Controllers\PanelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ConsultaController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/sedes', [SedeController::class, 'index'])->name('sedes');

Route::get('/contacto', [ContactoController::class, 'mostrarFormulario'])->name('contacto.formulario');
Route::post('/contacto', [ContactoController::class, 'enviarFormulario'])->name('contacto.enviar');

Route::get('/consultas', [ConsultaController::class, 'index'])->middleware('auth')->name('consultas.index');

// =================== TURNOS ====================
Route::get('/turnos', [TurnoController::class, 'mostrarFormulario'])->middleware('auth')->name('turnos.formulario');
Route::post('/turnos', [TurnoController::class, 'enviarFormulario'])->middleware('auth')->name('turnos.enviar');

// =================== PANELES ====================

// Redirigir después del login según el rol (esto lo manejás desde AuthController como vimos)

// ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');
    Route::get('/admin/turnos', [TurnoController::class, 'adminIndex'])->name('admin.turnos');
});

// PROFESIONAL
Route::middleware(['auth'])->group(function () {
    Route::get('/profesional/dashboard', [ProfesionalController::class, 'panel'])->name('profesional.dashboard');
});

// CLIENTE
Route::middleware(['auth'])->group(function () {
    Route::get('/cliente/dashboard', [ClienteController::class, 'panel'])->name('cliente.dashboard');
});

// DASHBOARD GENERAL (en desuso si usás redirección por rol)
Route::get('/dashboard', [PanelController::class, 'index'])->middleware(['auth'])->name('dashboard');



Route::get('/redirect', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.panel');
    } elseif ($user->role === 'profesional') {
        return redirect()->route('profesional.dashboard');
    } else {
        return redirect()->route('cliente.dashboard');
    }
})->middleware(['auth']);


// =================== AUTENTICACIÓN ====================
require __DIR__.'/auth.php';