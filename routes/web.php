<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', [VehicleController::class, 'index']);
Route::resource('vehicles', VehicleController::class);

