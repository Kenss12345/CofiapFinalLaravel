@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Lista de Pedidos</h2>

        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <!-- Agrega aquí más columnas según tus necesidades -->
                    <th class="py-2 px-4 border-b">Fecha Pedido</th>
                    <th class="py-2 px-4 border-b">Fecha Entrada</th>
                    <th class="py-2 px-4 border-b">Estado Pedido</th>
                    <th class="py-2 px-4 border-b">Método Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $pedido->id }}</td>
                        <!-- Agrega aquí más celdas según tus necesidades -->
                        <td class="py-2 px-4 border-b">{{ $pedido->fechapedido }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->fechaentrada }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->estadopedido }}</td>
                        <td class="py-2 px-4 border-b">{{ $pedido->metodopago }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection