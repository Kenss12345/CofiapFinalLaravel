<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;



Route::get('/', function () {
    return view('home');
});

// Registro
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// LOGUEO
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

// Admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

// Productos
//Lista de productos
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])
    ->name('products.index');

//Crear nuevo producto
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])
    ->name('products.create');

Route::post('/products/create', [App\Http\Controllers\ProductsController::class, 'store'])
    ->name('products.store');

//Modificar Producto
Route::put('/products/{product}', [ProductsController::class, 'update'])
    ->name('products.update');

//Eliminar Producto
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])
    ->name('products.destroy');

//Registrar venta
Route::get('/sales/create', [App\Http\Controllers\SalesController::class, 'create'])
    ->name('sales.create');

Route::post('/sales', [App\Http\Controllers\SalesController::class, 'store'])
    ->name('sales.store');

