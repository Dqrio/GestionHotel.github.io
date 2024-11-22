<?php

use App\Http\Controllers\HuespedController;
use app\Http\Controllers\ReporteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// Habitaciones
Route::get('/habitaciones', [HabitacionesController::class, 'index'])->name('habitaciones.index');

Route::get('/habitaciones/create', [HabitacionesController::class, 'create'])->name('modules.habitaciones.create');

Route::post('/habitaciones/store', [HabitacionesController::class, 'store'])->name('modules.habitaciones.store');

Route::get('/habitaciones/show/{id}', [HabitacionesController::class, 'show'])->name('habitaciones.show');

Route::get('/habitaciones/edit/{id}', [HabitacionesController::class, 'edit'])->name('habitaciones.edit');

Route::put('/habitaciones/update/{id}', [HabitacionesController::class, 'update'])->name('habitaciones.update');

Route::delete('/habitaciones/destroy/{id}', [HabitacionesController::class, 'destroy'])->name('habitaciones.destroy');



// Reservas
Route::get('/reservas', [ReservaController::class, 'index'])->name('modules.reservas.index');

Route::get('/reservas/filtrar', [ReservaController::class, 'filtrar'])->name('reservas.filtrar');

Route::get('/reservas/create', [ReservaController::class, 'create'])->name('modules.reservas.create');
Route::post('reservas/store', [ReservaController::class, 'store'])->name('store');

Route::get('/reservas/show/{id}', [ReservaController::class, 'show'])->name('reservas.show');
    
Route::get('/reservas/edit/{id}', [ReservaController::class, 'edit'])->name('reservas.edit');

Route::put('/reservas/update/{id}', [ReservaController::class, 'update'])->name('reservas.update');

Route::delete('/reservas/destroy/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');



//Huespedes
Route::get('/huesped', [HuespedController::class, 'index'])->name('modules.huesped.index');