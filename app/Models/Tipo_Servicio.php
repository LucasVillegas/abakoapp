<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Servicio extends Model
{
    use HasFactory;

    protected $table = 'tipo_servicio';

    protected $fillable = [
        'nombre_tipo_servicio',
        'estado_tipo_servicio',
    ];

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}