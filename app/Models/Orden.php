<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'orden';

    protected $fillable = [
        'cliente_id',
        'users_id',
        'nun_orden',
        'fecha_inicio',
        'fecha_fin',
        'fecha_envio',
        'fecha_entrega',
        'estado_orden'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}