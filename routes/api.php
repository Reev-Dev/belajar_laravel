<?php

use App\Http\Controllers\Api\SensorController as ApiSensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sensor', [ApiSensorController::class, 'index']);
Route::get('/sensor/{id}', [ApiSensorController::class, 'show']);
Route::post('/sensor', [ApiSensorController::class, 'store']);