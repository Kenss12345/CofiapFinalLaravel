<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Carbon;

class ProductsController extends Controller
{
    //Lista de productos
    public function index()
    {
        $products = Producto::all();
        return view('products.index', compact('products'));
    }

    //Crear productos
    public function create()
    {
        return view('products.create');
    }

    //Almacenar productos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidadProducto' => 'required|numeric',
            'loteProduccion' => 'required',
            'fechaCaducidad' => 'required|date_format:Y-m-d', // Formato ajustado a Y-m-d
            'clasificacion' => 'nullable',
        ]);

        $product = new Producto();

        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->cantidadProducto = $request->cantidadProducto;
        $product->loteProduccion = $request->loteProduccion;
        $product->fechaCaducidad = $request->fechaCaducidad; // Ya está en el formato correcto
        $product->clasificacion = $request->clasificacion;

        $product->save();

        return redirect()->route('products.index');
    }

    //Actualizar producto
    public function update(Request $request, Producto $product)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidadProducto' => 'required|integer',
            'loteProduccion' => 'required|string|max:255',
            'fechaCaducidad' => 'required|date',
            'clasificacion' => 'required|string|max:255',
        ]);

        // Actualizar los datos del producto
        $product->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'cantidadProducto' => $request->cantidadProducto,
            'loteProduccion' => $request->loteProduccion,
            'fechaCaducidad' => $request->fechaCaducidad,
            'clasificacion' => $request->clasificacion,
        ]);

        // Redirigir a la vista o ruta deseada después de la actualización
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
    }

    //Eliminar Producto
    public function destroy(Producto $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    }
}

