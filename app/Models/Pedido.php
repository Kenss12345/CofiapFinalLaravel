<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'idcliente',
        'fechapedido',
        'fechaentrada',
        'estadopedido',
        'metodopago',
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }
}