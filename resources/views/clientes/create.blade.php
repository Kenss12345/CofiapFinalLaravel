@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')
    <div class="flex justify-center items-center">
        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
            @csrf
            <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Registrar Nuevo Cliente</h2>
            
            <div class="my-2">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="w-full bg-gray-200 p-2 text-lg rounded" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-2">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="w-full bg-gray-200 p-2 text-lg rounded" required>
                @error('apellido')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-2">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="w-full bg-gray-200 p-2 text-lg rounded" required>
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-2">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="w-full bg-gray-200 p-2 text-lg rounded" required>
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-2">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" class="w-full bg-gray-200 p-2 text-lg rounded" required>
                @error('correo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="my-3 w-full bg-blue-500 p-2 font-semibold
            rounded text-white hover:bg-blue-600">Registrar</button>
        </form>
    </div>
@endsection