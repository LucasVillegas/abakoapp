<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajador';

    protected $fillable = [
        'persona_id',
        'salario',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }
}