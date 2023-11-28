<!-- create.blade.php -->

@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')
    <h2>Registrar Nuevo Cliente</h2>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>

        <button type="submit">Registrar</button>
    </form>
@endsection