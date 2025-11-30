<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\VentaController;




use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('autores', AutorController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('libros', LibroController::class);
Route::apiResource('ventas', VentaController::class);