<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductor';

    protected $fillable = [
        'persona_id',
        'salario',
        'transportadora',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function ordenes_despacho()
    {
        return $this->hasMany(Orden_Despacho::class);
    }
}