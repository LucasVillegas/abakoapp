<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicio';

    protected $fillable = [
        'tipo_servicio_id',
        'trabajador_id',
        'fecha_inicio',
        'fecha_fin',
        'costo_supuesto',
        'costo_real',
        'dif_costo',
        'estado_servicio',
    ];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }

    public function tipo_servicio()
    {
        return $this->belongsTo(Tipo_Servicio::class);
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }
}