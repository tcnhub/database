<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SeccionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::resource('secciones', SeccionController::class)->parameters(['secciones' => 'seccion_individual']);
Route::resource('productos', ProductoController::class)->parameters(['productos' => 'producto']);
Route::resource('categorias', CategoriaController::class)->parameters(['categorias' => 'categoria']);

