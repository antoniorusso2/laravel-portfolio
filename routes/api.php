<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// queste rotte di default avranno come prefisso /api

Route::get('/projects', [App\Http\Controllers\Api\ProjectController::class, 'index']);

Route::get('/projects/{project}', [App\Http\Controllers\Api\ProjectController::class, 'show']);
