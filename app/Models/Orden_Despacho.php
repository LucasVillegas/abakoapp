<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_Despacho extends Model
{
    use HasFactory;

    protected $table = 'orden_despacho';

    protected $fillable = [
        'nunserie',
        'cliente_id',
        'users_id',
        'forma_pago_id',
        'conductor_id',
        'nunpedido',
        'fecha_orden_despacho',
        'total_orden_despacho',
        'valor_flete',
        'peso',
        'estado_orden_despacho',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forma_pago()
    {
        return $this->belongsTo(Forma_Pago::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }
}