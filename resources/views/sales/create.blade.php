<!-- resources/views/sales/create.blade.php -->
@extends('layouts.app')

@section('title', 'Registrar Venta')

@section('content')

<div class="flex justify-center items-center">
    <form action="{{ route('sales.store') }}" method="POST" class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
        @csrf
        <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Registrar Venta</h2>

        <!-- Agrega aquí los campos necesarios para el formulario de venta -->

        <button type="submit" class="my-3 w-full bg-blue-500 p-2 font-semibold rounded text-white hover:bg-blue-600">Registrar Venta</button>
    </form>
</div>

@endsection