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
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AdminTurnoController;
use App\Http\Controllers\AdminUsuarioController;


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
/*Route::middleware(['auth'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');
    Route::get('/admin/turnos', [TurnoController::class, 'adminIndex'])->name('admin.turnos');
});*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/panel', [AdminController::class, 'panel'])->name('admin.panel');
    Route::get('/admin/turnos', [TurnoController::class, 'adminIndex'])->name('admin.turnos');

    Route::get('/turnos/crear', [AdminTurnoController::class, 'crear'])->name('admin.turnos.crear');
    Route::post('/turnos', [AdminTurnoController::class, 'guardar'])->name('admin.turnos.guardar');
    Route::get('/turnos/{id}/editar', [AdminTurnoController::class, 'editar'])->name('admin.turnos.editar');
Route::delete('/admin/turnos/{id}', [AdminTurnoController::class, 'eliminar'])->name('admin.turnos.eliminar');
Route::put('/turnos/{id}', [AdminTurnoController::class, 'actualizar'])->name('admin.turnos.actualizar');



Route::get('/admin/usuarios', [App\Http\Controllers\AdminUsuarioController::class, 'index'])->name('admin.usuarios.index');
Route::post('/admin/usuarios/{id}/activar', [App\Http\Controllers\AdminUsuarioController::class, 'activar'])->name('admin.usuarios.activar');
Route::post('/admin/usuarios/{id}/desactivar', [App\Http\Controllers\AdminUsuarioController::class, 'desactivar'])->name('admin.usuarios.desactivar');

Route::get('/admin/usuarios/crear', [AdminUsuarioController::class, 'create'])->name('admin.usuarios.create');
Route::post('/admin/usuarios', [AdminUsuarioController::class, 'store'])->name('admin.usuarios.store');

    

 // CRUD de servicios
    Route::get('/admin/servicios', [ServicioController::class, 'index'])->name('admin.servicios.index');
    Route::get('/admin/servicios/crear', [ServicioController::class, 'create'])->name('admin.servicios.crear');
    Route::get('/admin/servicios/crear', [ServicioController::class, 'create'])->name('admin.servicios.create');
    Route::post('/admin/servicios', [ServicioController::class, 'store'])->name('admin.servicios.store');
    Route::get('/admin/servicios/{id}/editar', [ServicioController::class, 'edit'])->name('admin.servicios.edit');
    Route::put('/admin/servicios/{id}', [ServicioController::class, 'update'])->name('admin.servicios.update');
    Route::delete('/admin/servicios/{id}', [ServicioController::class, 'destroy'])->name('admin.servicios.destroy');
});

// PROFESIONAL
Route::middleware(['auth'])->group(function () {
    Route::get('/profesional/dashboard', [ProfesionalController::class, 'dashboard'])->name('profesional.dashboard');
    Route::put('/profesional/turnos/{id}/historial', [ProfesionalController::class, 'guardarHistorial'])->name('profesional.guardarHistorial');


});

// CLIENTE
// =================== CLIENTE ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/cliente/dashboard', [ClienteController::class, 'panel'])->name('cliente.dashboard');
    Route::post('/cliente/turno/solicitar', [TurnoController::class, 'solicitarTurno'])->name('cliente.turno.solicitar');
    


   
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



Route::get('/api/turnos-ocupados', [TurnoController::class, 'horasOcupadas']);

// =================== AUTENTICACIÓN ====================
require __DIR__.'/auth.php';