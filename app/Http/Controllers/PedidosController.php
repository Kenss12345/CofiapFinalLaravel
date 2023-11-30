<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;

class PedidosController extends Controller
{
    // Muestra el formulario de registro de pedidos
    public function create()
    {
        // Obtén todos los productos para pasarlos a la vista
        // Obtén todos los clientes y productos para pasarlos a la vista
        $clientes = Cliente::all();
        $productos = Producto::all();

        return view('pedidos.create', compact('clientes', 'productos'));
    }

    // Almacena un nuevo pedido
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'idcliente' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'fechapedido' => 'required|date',
            'fechaentrada' => 'required|date',
            'estadopedido' => 'required|string|max:1',
            'metodopago' => 'required|string|max:20',
            // Otros campos del pedido que puedas tener...
        ]);

        // Crea un nuevo pedido
        Pedido::create([
            'idcliente' => $request->idcliente,
            'producto_id' => $request->producto_id,
            'fechapedido' => $request->fechapedido,
            'fechaentrada' => $request->fechaentrada,
            'estadopedido' => $request->estadopedido,
            'metodopago' => $request->metodopago,
            // Otros campos del pedido que puedas tener...
        ]);

        // Redirige a donde desees después de almacenar el pedido
        return redirect()->route('pedidos.index')->with('success', 'Pedido registrado exitosamente');
    }

    public function index()
    {
    $pedidos = Pedido::all();
    return view('pedidos.index', compact('pedidos'));
    }
}