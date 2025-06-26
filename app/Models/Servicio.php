<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio'];

    public function turnos()
    {
        return $this->belongsToMany(Turno::class);
    }
}
