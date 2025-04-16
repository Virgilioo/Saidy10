<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EstudanteController;
use App\Http\Controllers\API\UserController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


Route::get('estudantes', [EstudanteController::class, 'index']);
Route::post('estudantes', [EstudanteController::class, 'store']);
Route::get('estudantes/{id}', [EstudanteController::class, 'show']);
Route::put('estudantes/{id}', [EstudanteController::class, 'update']);
Route::delete('estudantes/{id}', [EstudanteController::class, 'destroy']);
