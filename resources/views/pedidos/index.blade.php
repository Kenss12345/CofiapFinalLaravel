@extends('layouts.app')

@section('title', 'Lista de Pedidos')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Lista de Pedidos</h2>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <table class="min-w-full table-auto border border-gray-300">
            <thead>
                <tr class="bg-green-500 text-white">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Fecha Pedido</th>
                    <th class="py-2 px-4 border-b">Fecha Entrada</th>
                    <th class="py-2 px-4 border-b">Estado Pedido</th>
                    <th class="py-2 px-4 border-b">Método Pago</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $pedido->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->fechapedido }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->fechaentrada }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->estadopedido }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->metodopago }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-2 px-4 border-b text-center">No hay pedidos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection