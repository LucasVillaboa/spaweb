<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;

Route::get('/turnos-ocupados', [TurnoController::class, 'horasOcupadas']);



