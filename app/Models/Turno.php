<?php

namespace App\Models;
use App\Models\Servicio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'nombre',
    'email',
    'apellido',
    'fecha',
    'hora',
    'servicio',
    'comentarios',
    'profesional_id',
    'medio_pago',
    'precio_total',
    'descuento',
    'precio_final',
];
    public function user()
{
    return $this->belongsTo(User::class);
}

/*public function clienteDashboard()
{
    $servicios = Servicio::all();
    return view('cliente.dashboard', compact('servicios'));
}
*/
public function cliente()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

public function servicios()
{
    return $this->belongsToMany(Servicio::class);
}

/*public function cliente()
{
    return $this->belongsTo(User::class, 'cliente_id');
}*/

public function profesional()
{
    return $this->belongsTo(User::class, 'profesional_id');
}


}