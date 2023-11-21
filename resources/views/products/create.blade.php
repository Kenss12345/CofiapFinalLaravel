@extends('layouts.app')

@section('title', 'Create')

@section('content')

<div class="flex justify-center items-center">
    <form action="{{ route('products.store') }}" method="POST" class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
        @csrf
        <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Crear Productos</h2>

        <div class="my-2">
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('nombre') }}">
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="precio" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
            <input type="text" id="precio" name="precio" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('precio') }}">
            @error('precio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="cantidadProducto" class="block text-sm font-medium text-gray-700 mb-1">Cantidad Producto</label>
            <input type="text" id="cantidadProducto" name="cantidadProducto" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('cantidadProducto') }}">
            @error('cantidadProducto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="loteProduccion" class="block text-sm font-medium text-gray-700 mb-1">Lote Produccion</label>
            <input type="text" id="loteProduccion" name="loteProduccion" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('loteProduccion') }}">
            @error('loteProduccion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="fechaCaducidad" class="block text-sm font-medium text-gray-700 mb-1">Fecha Caducidad</label>
            <input type="date" id="fechaCaducidad" name="fechaCaducidad" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('fechaCaducidad') }}">
            @error('fechaCaducidad')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="clasificacion" class="block text-sm font-medium text-gray-700 mb-1">Clasificacion</label>
            <input type="text" id="clasificacion" name="clasificacion" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" value="{{ old('clasificacion') }}">
            @error('clasificacion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="my-3 w-full bg-blue-500 p-2 font-semibold rounded text-white hover:bg-blue-600">Enviar</button>
    </form>
</div>

@endsection