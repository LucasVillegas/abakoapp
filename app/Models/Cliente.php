<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";

    protected $fillable = [
        'persona_id',
        'departamento',
        'municipio',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }

    public function ordenes_despacho()
    {
        return $this->hasMany(Orden_Despacho::class);
    }
}