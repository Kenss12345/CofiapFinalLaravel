<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'producto_id' => 'required', // Ajusta según tus necesidades
            'cantidad' => 'required|numeric',
            'total' => 'required|numeric',
            // Otros campos necesarios para tu venta
        ]);

        // Crear una nueva instancia del modelo Sale
        $sale = new Sale();

        // Asignar valores desde el formulario
        $sale->producto_id = $request->producto_id; // Ajusta según tus necesidades
        $sale->cantidad = $request->cantidad;
        $sale->total = $request->total;
        // Otros campos necesarios para tu venta

        // Guardar la venta
        $sale->save();

        // Redirigir a la vista o ruta deseada después de almacenar la venta
        return redirect()->route('sales.index')->with('success', 'Venta almacenada exitosamente');
    }
}
