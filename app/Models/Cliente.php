<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
        '_token', // Agregar _token a la lista de atributos fillable
    ];

    // Definir la relación con pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'idcliente');
    }
}