<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forma_Pago extends Model
{
    use HasFactory;

    protected $table = 'forma_pago';

    protected $fillable = [
        'nombre_forma_pago',
        'estado_forma_pago'
    ];

    public function ordenes_despacho()
    {
        return $this->hasMany(Orden_Despacho::class);
    }
}