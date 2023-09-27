<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulo';

    protected $fillable = [
        'serie_articulo_id',
        'codarticulo',
        'descripcion',
        'referencia',
        'medida',
        'costo',
        'precio_venta',
        'precio_minino',
        'ultimo_coste',
        'estado_articulo',
    ];

    public function componente()
    {
        return $this->hasMany(Componente::class);
    }

    public function serie_artiulo()
    {
        return $this->belongsTo(Serie_Articulo::class, 'serie_articulo_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }



    public function almacen()
    {
        return $this->hasMany(Almacen::class);
    }
}