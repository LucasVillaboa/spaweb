<?php
<<<<<<< HEAD

=======
use App\Http\Controllers\DashboardController;
>>>>>>> 58f0530 (Se agrega Panel)
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ConsultaController;

<<<<<<< HEAD
=======
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


>>>>>>> 58f0530 (Se agrega Panel)
Route::get('/', function () {
    return view('inicio');
});

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/turnos', [TurnoController::class, 'mostrarFormulario'])->middleware('auth')->name('turnos.formulario');
Route::post('/turnos', [TurnoController::class, 'enviarFormulario'])->middleware('auth')->name('turnos.enviar');

Route::get('/contacto', [ContactoController::class, 'mostrarFormulario'])->name('contacto.formulario');
Route::post('/contacto', [ContactoController::class, 'enviarFormulario'])->name('contacto.enviar');

Route::get('/sedes', [SedeController::class, 'index'])->name('sedes');

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

=======
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
>>>>>>> 58f0530 (Se agrega Panel)
Route::get('/consultas', [ConsultaController::class, 'index'])->middleware('auth')->name('consultas.index');

// Eliminar o comentar esta si sigue generando error
// Route::get('/admin/turnos', [TurnoController::class, 'adminIndex'])->middleware('admin')->name('admin.turnos');

// Si querés que esa ruta siga existiendo, pero solo para usuarios logueados:
Route::get('/admin/turnos', [TurnoController::class, 'adminIndex'])->middleware('auth')->name('admin.turnos');

require __DIR__.'/auth.php';