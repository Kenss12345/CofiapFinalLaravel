@extends('layouts.app')

@section('title', 'Create')

@section('content')

<div class="flex justify-center items-center">
    <form action="{{ route('products.store') }}" method="POST" class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
        @csrf
        <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Crear Productos</h2>
        
        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Precio" name="precio" value="{{ old('precio') }}">
            @error('precio')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Cantidad Producto" name="cantidadProducto" value="{{ old('cantidadProducto') }}">
            @error('cantidadProducto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Lote Produccion" name="loteProduccion" value="{{ old('loteProduccion') }}">
            @error('loteProduccion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Fecha Caducidad" name="fechaCaducidad" id="fechaCaducidad" value="{{ old('fechaCaducidad') }}">
            @error('fechaCaducidad')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-2">
            <input class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" 
            placeholder="Clasificacion" name="clasificacion" value="{{ old('clasificacion') }}">
            @error('clasificacion')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="my-3 w-full bg-blue-500 p-2 font-semibold
        rounded text-white hover:bg-blue-600">Enviar</button>
    </form>
</div>

@push('scripts')
    <script>
        document.getElementById('fechaCaducidad').addEventListener('input', function () {
            let inputValue = this.value.replace(/\D/g, ''); // Elimina todos los caracteres que no sean dígitos
            if (inputValue.length > 2) {
                inputValue = inputValue.slice(0, 2) + '/' + inputValue.slice(2);
            }
            if (inputValue.length > 5) {
                inputValue = inputValue.slice(0, 5) + '/' + inputValue.slice(5, 9);
            }
            this.value = inputValue;
        });
    </script> 
@endpush

@endsection