<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    protected $fillable = [
        'persona_id',
        'nit',
        'rut',
        'organizacion',
        'correo',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}