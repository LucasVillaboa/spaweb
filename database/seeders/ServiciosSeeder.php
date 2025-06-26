<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB; // 👈 Importante

class ServiciosSeeder extends Seeder
{
    public function run(): void
    {
        // Vacía la tabla antes de insertar
        DB::table('servicios')->truncate();

        Servicio::create([
            'nombre' => 'Masajes Relajantes',
            'descripcion' => 'Anti-estrés, descontracturantes, piedras calientes y más para tu bienestar físico y mental.',
            'precio' => 7000,
        ]);

        Servicio::create([
            'nombre' => 'Tratamientos Faciales',
            'descripcion' => 'Limpieza profunda, hidratación, tecnología avanzada para el cuidado de la piel.',
            'precio' => 8500,
        ]);

        Servicio::create([
            'nombre' => 'Belleza y Cuidado',
            'descripcion' => 'Manos, pies, lifting de pestañas, depilación facial y más.',
            'precio' => 6500,
        ]);

        Servicio::create([
            'nombre' => 'Tratamientos Corporales',
            'descripcion' => 'Reducción de celulitis, criofrecuencia, ultracavitación, dermohealth y más.',
            'precio' => 9000,
        ]);

        Servicio::create([
            'nombre' => 'Servicios Grupales',
            'descripcion' => 'Sesiones de yoga e hidromasajes en grupo para conectar cuerpo y mente.',
            'precio' => 10000,
        ]);
    }
}




