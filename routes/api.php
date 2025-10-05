<?php

use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::apiResource('projects', ProjectController::class)->only('index', 'show');
Route::apiResource('technologies', TechnologyController::class)->only('index');

Route::fallback(
    function () {
        return response()->json([
            'success' => false,
            'message' => 'API Endpoint not found'
        ], 404);
    }
);
