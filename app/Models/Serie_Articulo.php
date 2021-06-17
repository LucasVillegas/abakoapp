<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie_Articulo extends Model
{
    use HasFactory;

    protected $table = 'serie_articulo';

    protected $fillable = [
        'descripcion_serie_articulo',
        'estado_serie',
    ];

    public function articulo()
    {
        return $this->hasMany(Articulo::class);
    }
}