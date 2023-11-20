<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Bienvenido</title>
    
    <!-- Tailwind CSS Link -->
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Font Awesome Link 
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
      integrity="sha384-e6YSSRtje1FKRsnOMY87I3n5ceMFOENJdX8b39+z8CeB5WZ1YlFxBZkFF94x2GAWp" 
      crossorigin="anonymous"> -->
  </head>

  <body class="bg-gray-100 text-gray-800">
    
    <nav class="flex py-5 bg-green-500 text-white">
      <div class="w-1/2 px-12 mr-auto">
        <p class="text-2xl font-bold">COFIAP S.A.C</p>
      </div>
      
      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">

        <!-- Si se loguea correctamente se muestra los botones: Salir,Productos y crear-->
        @if(auth()->check())

        <div class="h-16 flex items-center justify-start py-4 px-16">
        <a href="{{route('products.index')}}" class="border border-green-900 rounded px-4 pt-1 h-10 bg-white text-green-900 font-semibold">Productos</a>
        <a href="{{route('products.create')}}" class="text-white rounded px-4 pt-1 h-10 bg-green-800 font-semibold mx-2 hover:bg-green-1000">Crear</a>
        </div> 

        <li class="mx-8 flex items-center">
        <p class="text-xl">Bienvenido <b>{{ auth()->user()->name }}</b></p>
        <a href="{{ route('login.destroy') }}" class="font-bold py-3 px-4 rounded-md bg-red-500 hover:bg-red-600 ml-4">Salir</a>
        </li>

        <!-- Si NO se loguea correctamente se muestra los botones: Ingresar y registrarse-->
        @else
        <li class="mx-6">
          <a href="{{ route('login.index') }}" class="font-semibold 
          hover:bg-green-800 py-3 px-4 rounded-md">Ingresar</a>
        </li>
        <li>
          <a href="{{ route('register.index') }}" class="font-semibold
          border-2 border-white py-2 px-4 rounded-md hover:bg-white 
          hover:text-green-900">Registrarse</a>
        </li>
        

      @endif
      </ul>

    </nav>


    @yield('content')


  </body>
</html>