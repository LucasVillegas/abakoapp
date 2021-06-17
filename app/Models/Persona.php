<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = "persona";

    protected $fillable = [
        'identificacion',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'genero',
        'estado_persona'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function trabajador()
    {
        return $this->hasOne(Trabajador::class);
    }

    public function conductor()
    {
        return $this->hasOne(Conductor::class);
    }

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class);
    }
}