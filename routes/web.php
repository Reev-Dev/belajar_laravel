<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth-check')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::controller(SensorController::class)->group(function() {
        Route::get('/sensor',  'index')->name('sensor.index');
        Route::get('/sensor/create',  'create')->name('sensor.create');
        Route::post('/sensor/store',  'store')->name('sensor.store');
        Route::get('/sensor/edit/{id}',  'edit')->name('sensor.edit');
        Route::put('/sensor/update/{id}',  'update')->name('sensor.update');
        Route::delete('/sensor/delete/{id}', action:  'delete')->name('sensor.delete');
    });
});

Route::middleware('is-admin')->group( function () {
    Route::get('device', [DeviceController::class, 'index'])->name('device.index');
    Route::get('device/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('device/store', [DeviceController::class, 'store'])->name('device.store');
    Route::get('device/edit/{id}', [DeviceController::class, 'edit'])->name('device.edit');
    Route::put('device/update/{id}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('device/delete/{id}', [DeviceController::class, 'delete'])->name('device.delete');
});

Route::controller(AuthController::class)->group(function () {
        Route::get('/change-password', 'viewChangePassword')->name('auth.viewChangePassword');
        Route::post('/change-password', 'changePassword')->name('auth.changePassword');
});