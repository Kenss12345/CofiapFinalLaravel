@extends('layouts.app')

@section('title', 'Listado de Clientes')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Listado de Clientes</h2>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <table class="min-w-full table-auto border border-gray-300">
            <thead>
                <tr class="bg-green-500 text-white">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Apellido</th>
                    <th class="py-2 px-4 border-b">Dirección</th>
                    <th class="py-2 px-4 border-b">Teléfono</th>
                    <th class="py-2 px-4 border-b">Correo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $cliente->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->nombre }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->apellido }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->direccion }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->telefono }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->correo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-2 px-4 border-b text-center">No hay clientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection