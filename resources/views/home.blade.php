@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="bg-gradient-to-r from-green-500 to-blue-300 min-h-screen flex items-center justify-center">
  <div class="text-white text-center mx-4">
    <img src="{{ asset('images\logo.jpg') }}" alt="Imagen de bienvenida" class="w-32 h-32 mx-auto mb-4">
    <h1 class="text-5xl font-bold">¡Bienvenido a COFIAP!</h1>

    <p class="text-base mt-4 mx-auto max-w-xl">
      Somos COFIAP S.A.C, una empresa agrícola peruana con cuatro años de experiencia en el Valle 
      del Mantaro. Nuestro enfoque es el desarrollo de tecnologías innovadoras para la agricultura 
      y la provisión de soluciones a los productores de semillas certificadas de papa.
    </p>

    <p class="text-xs mt-6 mx-auto max-w-xl">
      ¿Ya tienes una cuenta?
    </p>

    <a href="{{ route('login.index') }}" 
    class="mt-2 inline-block bg-yellow-400 
    text-yellow-900 px-6 py-3 
    rounded-full 
    text-lg 
    font-semibold 
    hover:bg-yellow-500">Comenzar</a>

  </div>
</div>
<style>
  body {
    overflow: hidden; /* Evita el desplazamiento vertical */
  }
</style>
@endsection