@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<br>
<br>

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <table class="table-fixed w-full">
      <thead>

        <tr class="bg-green-500 text-white">
          <th class="w-20 py-4 ...">ID</th>
          <th class="w-1/8 py-4 ...">Nombres</th>
          <th class="w-1/16 py-4 ...">Precio</th>
          <th class="w-1/16 py-4 ...">Cantidad Producto</th>
          <th class="w-1/16 py-4 ...">Lote Produccion</th>
          <th class="w-1/16 py-4 ...">Fecha Caducidad</th>
          <th class="w-1/16 py-4 ...">Creado</th>
          <th class="w-1/16 py-4 ...">Actualizado</th>
          <th class="w-28 py-4 ...">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $row) <!--Bucle-->

        
        <tr>
            <td class="py-3 px-6">{{$row->id}}</td>
            <td class="p-3">{{$row->nombre}}</td>
            <td class="p-3 text-center">{{$row->precio}}</td>
            <td class="p-3 text-center">{{$row->cantidadProducto}}</td>
            <td class="p-3 text-center">{{$row->loteProduccion}}</td>
            <td class="p-3 text-center">{{$row->fechaCaducidad}}</td>
            <td class="p-3 text-center">{{$row->created_at}}</td>
            <td class="p-3 text-center">{{$row->updated_at}}</td>
            <td class="p-3">
                <form id="deleteForm{{ $row->id }}" action="{{ route('products.destroy', ['product' => $row->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded-sm delete-button" data-product-id="{{ $row->id }}">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
                <button 
                class="bg-green-500 text-white px-3 py-1 rounded-sm edit-button" 
                data-product-id="{{ $row->id }}">
                  <i class="fas fa-pen"></i> Editar
                </button>
            </td>
                </tr>
                
        @endforeach
        
      </tbody>
    </table>
</div>
@endsection

<!--@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-e6YSSRtje1FKRsnOMY87I3n5ceMFOENJdX8b39+z8CeB5WZ1YlFxBZkFF94x2GAWp" crossorigin="anonymous">
@endpush -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Script para la ventana emergente de modificar -->
<script>
    // Agrega esto en tu archivo Blade o script JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-button');
        const editModal = document.getElementById('editModal');
        const closeModalButton = document.getElementById('closeModal');
        const editForm = document.getElementById('editForm');

        editButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                // Obtiene el ID del producto desde el botón de edición
                const productId = button.getAttribute('data-product-id');
                editForm.action = editForm.action.replace('__product_id__', productId);

                // Puedes cargar los datos del producto para prellenar el formulario aquí
                // Ejemplo: const productData = getProductData(productId);
                // Luego, establece los valores de los campos del formulario según productData

                // Abre el modal
                editModal.classList.remove('hidden');
            });
        });

        closeModalButton.addEventListener('click', function () {
            // Cierra el modal
            editModal.classList.add('hidden');
        });
    });
</script>

<!--Script para la ventana emergente de eliminar-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                // Obtiene el ID del producto desde el botón de eliminación
                const productId = button.getAttribute('data-product-id');

                // Utiliza SweetAlert2 para mostrar la ventana emergente de confirmación
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'No podrás revertir esto',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, envía el formulario de eliminación
                        const deleteForm = document.getElementById('deleteForm' + productId);
                        deleteForm.submit();
                    }
                });
            });
        });
    });
</script>

<!--Modal de la ventana emergente de modificar-->
<div id="editModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 overflow-y-auto h-full w-full z-50">
    <div class="modal-container mx-auto sm:px-6 lg:px-8 p-8">
        <!-- Contenido del modal aquí -->
        <div class="bg-white rounded shadow-lg p-5">
            <h2 class="text-2xl text-center mb-4 font-semibold">Editar Producto</h2>
            <!-- Formulario de edición -->
            <form id="editForm" action="{{ route('products.update', ['product' => '__product_id__']) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campos de edición -->
                <div class="my-2">
                    <label for="editNombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="editNombre" name="nombre" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <div class="my-2">
                    <label for="editPrecio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" id="editPrecio" name="precio" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <div class="my-2">
                    <label for="editCantidadProducto" class="block text-sm font-medium text-gray-700">Cantidad Producto</label>
                    <input type="number" id="editCantidadProducto" name="cantidadProducto" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <div class="my-2">
                    <label for="editLoteProduccion" class="block text-sm font-medium text-gray-700">Lote Produccion</label>
                    <input type="text" id="editLoteProduccion" name="loteProduccion" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <div class="my-2">
                    <label for="editFechaCaducidad" class="block text-sm font-medium text-gray-700">Fecha Caducidad</label>
                    <input type="date" id="editFechaCaducidad" name="fechaCaducidad" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <div class="my-2">
                    <label for="editClasificacion" class="block text-sm font-medium text-gray-700">Clasificacion</label>
                    <input type="text" id="editClasificacion" name="clasificacion" class="w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" required>
                </div>

                <!-- Botones del formulario -->
                <div class="flex justify-between mt-4">
                    <button 
                    type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-sm">Guardar Cambios
                    </button>
                    <button 
                    id="closeModal" class="bg-gray-500 text-white px-3 py-1 rounded-sm">Cerrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>