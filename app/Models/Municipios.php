<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $fillable = [
        'departamento_id',
        'codigo',
        'nombre',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }
}