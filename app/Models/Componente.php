<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    use HasFactory;

    protected $table = 'componente';

    protected $fillable = [
        'articulo_id',
        'descripcion_componente',
        'codigo_componente',
        'referencia',
        'unidad',
        'medida',
        'ultimo_coste',
        'costo_total',
        'estado_componente',
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}