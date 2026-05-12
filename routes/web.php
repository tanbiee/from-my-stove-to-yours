<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index']);

Route::get('/create', [RecipeController::class, 'create']);

Route::post('/store', [RecipeController::class, 'store']);

Route::get('/recipe/{id}', [RecipeController::class, 'show']);

Route::get('/edit/{id}', [RecipeController::class, 'edit']);

Route::put('/update/{id}', [RecipeController::class, 'update']);

Route::delete('/delete/{id}', [RecipeController::class, 'destroy']);
Route::get('/sort/{origin}', [RecipeController::class, 'sort']);