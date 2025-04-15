<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EstudanteController;

Route::get('estudantes', [EstudanteController::class, 'index']);
Route::post('estudantes', [EstudanteController::class, 'store']);
Route::get('estudantes/{id}', [EstudanteController::class, 'show']);
Route::put('estudantes/{id}', [EstudanteController::class, 'update']);
Route::delete('estudantes/{id}', [EstudanteController::class, 'destroy']);
