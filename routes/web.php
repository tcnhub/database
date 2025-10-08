<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SeccionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::resource('secciones', SeccionController::class)->parameters(['secciones' => 'seccion_individual']);
Route::resource('productos', ProductoController::class)->parameters(['productos' => 'producto']);
Route::resource('categorias',   CategoriaController::class)->parameters(['categorias' => 'categoria']);

// filtro para la busqueda en ajax
Route::post('/productos/filtrar', [ProductoController::class, 'filtrar'])->name('productos.filtrar');

