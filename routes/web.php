<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::view('/', 'welcome');

Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa.index');
    Route::get('/siswa/create', 'create')->name('siswa.create');
    Route::post('/siswa', 'store')->name('siswa.store');
});

// Route::get('/sensor', [SensorController::class, 'index']);

Route::middleware(Authcheck::class)->group(function () {
    Route::get('/sensor', [SensorController::class, 'index'])->name('sensor.index');
    Route::get('/sensor/create', [SensorController::class, 'create'])->name('sensor.create');
    Route::post('/sensor/store', [SensorController::class, 'store'])->name('sensor.store');
    Route::get('/sensor/edit/{id}', [SensorController::class, 'edit'])->name('sensor.edit');
    Route::put('/sensor/update/{id}', [SensorController::class, 'update'])->name('sensor.update');
    Route::delete('/sensor/delete/{id}', [SensorController::class, 'delete'])->name('sensor.delete');
});

Route::middleware(isAdmin::class)->group( function () {
    Route::get('device', [DeviceController::class, 'index'])->name('device.index');
    Route::get('device/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('device/store', [DeviceController::class, 'store'])->name('device.store');
    Route::get('device/edit/{id}', [DeviceController::class, 'edit'])->name('device.edit');
    Route::put('device/update/{id}', [DeviceController::class, 'update'])->name('device.update');
    Route::delete('device/delete/{id}', [DeviceController::class, 'delete'])->name('device.delete');
});

Route::controller(AuthController::class)->group(function () {
//     Route::get('/login', 'viewLogin')->name('auth.viewLogin');
//     Route::get('/register', 'viewRegister')->name('auth.viewRegister');
        Route::get('/change-password', 'viewChangePassword')->name('auth.viewChangePassword');
        Route::post('/change-password', 'changePassword')->name('auth.changePassword');
});