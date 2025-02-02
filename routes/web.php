<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\GatewayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorModelController;
use App\Http\Controllers\SensorTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('locations', LocationController::class);
    Route::resource('gateways', GatewayController::class);
    Route::resource('sensorModels', SensorModelController::class);
    Route::resource('sensorTypes', SensorTypeController::class);

    // Route::get('/locations', function () {
    //     return view('pages/configurations.locations.index');
    // });
    // Route::get('/locations/create', function () {
    //     return view('pages/configurations.locations.create');
    // });
    // Route::get('/gateways', function () {
    //     return view('pages/configurations.gateways.index');
    // });

    // Route::get('/gateways/create', function () {
    //     return view('pages/configurations.gateways.create');
    // });
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
