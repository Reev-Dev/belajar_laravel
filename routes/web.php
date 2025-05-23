<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

    Route::view('/', 'welcome');

Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa.index');
    Route::get('/siswa/create', 'create')->name('siswa.create');
    Route::post('/siswa', 'store')->name('siswa.store');
});

// Route::get('/sensor', [SensorController::class, 'index']);

Route::controller(SensorController::class)->group(function () {
    Route::get('/sensor', 'index')->name('sensor.index');
    Route::get('/sensor/create', 'create')->name('sensor.create');
    Route::post('/sensor/store', 'store')->name('sensor.store');
    Route::get('/sensor/edit/{id}', 'edit')->name('sensor.edit');
    Route::put('/sensor/update/{id}', 'update')->name('sensor.update');
    Route::delete('/sensor/destroy/{id}', 'destroy')->name('sensor.destroy');
});

Route::controller(DeviceController::class)->group( function () {
    Route::get('device', 'index')->name('device.index');
    Route::get('device/create', 'create')->name('device.create');
    Route::post('device/store', 'store')->name('device.store');
    Route::get('device/edit/{id}', 'edit')->name('device.edit');
    Route::put('device/update/{id}', 'update')->name('device.update');
    Route::delete('device/destroy/{id}', 'destroy')->name('device.destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'viewLogin')->name('login');
});