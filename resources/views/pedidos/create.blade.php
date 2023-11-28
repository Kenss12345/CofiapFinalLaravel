<!-- create.blade.php -->

@extends('layouts.app')

@section('title', 'Registrar Pedido')

@section('content')

<div class="flex justify-center items-center">
    <form action="{{ route('pedidos.store') }}" method="POST" class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
        @csrf
        <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Registrar Pedido</h2>
        
        <div class="my-2">
            <label for="idcliente">Cliente</label>
            <select id="idcliente" name="idcliente" class="w-full bg-gray-200 p-2 text-lg rounded">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
            @error('idcliente')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="producto_id">Producto</label>
            <select id="producto_id" name="producto_id" class="w-full bg-gray-200 p-2 text-lg rounded">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
            @error('producto_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="fechapedido">Fecha Pedido</label>
            <input type="date" id="fechapedido" name="fechapedido" class="w-full bg-gray-200 p-2 text-lg rounded" value="{{ old('fechapedido') }}">
            @error('fechapedido')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="fechaentrada">Fecha Entrada</label>
            <input type="date" id="fechaentrada" name="fechaentrada" class="w-full bg-gray-200 p-2 text-lg rounded" value="{{ old('fechaentrada') }}">
            @error('fechaentrada')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="estadopedido">Estado Pedido</label>
            <input type="text" id="estadopedido" name="estadopedido" class="w-full bg-gray-200 p-2 text-lg rounded" value="{{ old('estadopedido') }}">
            @error('estadopedido')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="metodopago">Método de Pago</label>
            <input type="text" id="metodopago" name="metodopago" class="w-full bg-gray-200 p-2 text-lg rounded" value="{{ old('metodopago') }}">
            @error('metodopago')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Otros campos del pedido que puedas tener... -->

        <button type="submit" class="my-3 w-full bg-blue-500 p-2 font-semibold
        rounded text-white hover:bg-blue-600">Enviar</button>
    </form>
</div>

@endsection