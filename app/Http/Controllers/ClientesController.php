<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'direccion' => 'required|string|max:35',
            'telefono' => 'required|string|max:9',
            'correo' => 'required|email|max:35',
        ]);

        $requestData = $request->except('_token');
        Cliente::create($requestData);

        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente');
    }
}
