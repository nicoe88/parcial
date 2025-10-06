<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

Route::post('/personas', [PersonaController::class, 'Crear']);
Route::delete('/personas/{id}', [PersonaController::class, 'Eliminar']);
Route::post('/personas/{id}', [PersonaController::class, 'Editar']);
Route::get('/personas/{id}', [PersonaController::class, 'Detalle']);
