<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// queste rotte di default avranno come prefisso /api

// Route::get('/projects', [ProjectController::class, 'index']);

// Route::get('/projects/{project}', [ProjectController::class, 'show']);

// laravel default shorthand per la gestione delle rotte relative ad un api.. con il metodo only si vanno a dichiarare le uniche funzioni desiderate e saranno create rotte inerenti solo alle funzioni desiderate
// in questo caso ci saranno solo gli endpoint api/projects e api/projects/{project}
Route::apiResource('projects', ProjectController::class)->only('index', 'show');
