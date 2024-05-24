<?php

use App\Http\Controllers\DiagnosticoMascotaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExamenAuxiliarMascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\HistoriaClinicaAdjuntoController;
use App\Http\Controllers\HistorialComprasController;
use App\Http\Controllers\MascotaGaleriaController;
use Illuminate\Support\Facades\Route;


Route::prefix('historia-clinica-adjunto')->group(function () {
    Route::get('/', [HistoriaClinicaAdjuntoController::class, 'findAll']);
    Route::post('/', [HistoriaClinicaAdjuntoController::class, 'store']);
    Route::put('/{id}', [HistoriaClinicaAdjuntoController::class, 'update']);
});

Route::prefix('historiaClinica')->group(function () {
    Route::post('/', [HistoriaClinicaController::class, 'store']);
    Route::put('/{id}', [HistoriaClinicaController::class, 'update']);
});

Route::prefix('mascota-galeria')->group(function () {
    Route::get('/', [MascotaGaleriaController::class, 'findAll']);
    Route::post('/', [MascotaGaleriaController::class, 'store']);
    Route::delete('/{id}', [MascotaGaleriaController::class, 'delete']);
});

Route::prefix('historial-compras')->group(function () {
    Route::get('/', [HistorialComprasController::class, 'findAll']);
   
});

Route::prefix('diagnosticoMascota')->group(function () {
    Route::post('/', [DiagnosticoMascotaController::class, 'store']);
    Route::put('/{id}', [DiagnosticoMascotaController::class, 'update']);
    Route::delete('/{id}', [DiagnosticoMascotaController::class, 'destroy']);
});

Route::prefix('examenAuxiliarMascota')->group(function () {
    Route::post('/', [ExamenAuxiliarMascotaController::class, 'store']);
    Route::put('/{id}', [ExamenAuxiliarMascotaController::class, 'update']);
    Route::delete('/{id}', [ExamenAuxiliarMascotaController::class, 'destroy']);
});

Route::prefix('evento')->group(function () {
    Route::post('/', [EventoController::class, 'store']);
    Route::put('/{id}', [EventoController::class, 'update']);
});




