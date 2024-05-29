<?php

use App\Http\Controllers\DiagnosticoMascotaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExamenAuxiliarMascotaController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\HistoriaClinicaAdjuntoController;
use App\Http\Controllers\HistorialComprasController;
use App\Http\Controllers\MascotaGaleriaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProductoGaleriaController;
use App\Http\Controllers\TratamientoMascotaController;
use Illuminate\Support\Facades\Route;


Route::prefix('historia-clinica-adjunto')->group(function () {
    Route::get('/', [HistoriaClinicaAdjuntoController::class, 'findAll']);
    Route::post('/', [HistoriaClinicaAdjuntoController::class, 'store']);
    Route::put('/{id}', [HistoriaClinicaAdjuntoController::class, 'update']);
});

Route::prefix('historiaClinica')->group(function () {
    Route::get('', [HistoriaClinicaController::class, 'findAll']);
    Route::post('/', [HistoriaClinicaController::class, 'store']);
    Route::put('/{id}', [HistoriaClinicaController::class, 'update']);
    Route::delete('/{id}', [HistoriaClinicaController::class, 'delete']);
});

Route::prefix('tratamiento')->group(function () {
    Route::post('', [TratamientoMascotaController::class, 'save']);
    Route::delete('{id}', [TratamientoMascotaController::class, 'delete']);
});

Route::prefix('mascota-galeria')->group(function () {
    Route::get('/', [MascotaGaleriaController::class, 'findAll']);
    Route::post('/', [MascotaGaleriaController::class, 'store']);
    Route::delete('/{id}', [MascotaGaleriaController::class, 'delete']);
});

Route::prefix('producto-galeria')->group(function () {
    Route::get('/', [ProductoGaleriaController::class, 'findAll']);
    Route::post('/', [ProductoGaleriaController::class, 'store']);
    Route::delete('/{id}', [ProductoGaleriaController::class, 'delete']);
});

Route::prefix('historial-compras')->group(function () {
    Route::get('/', [HistorialComprasController::class, 'findAll']);
   
});

Route::prefix('diagnosticoMascota')->group(function () {
    Route::post('/', [DiagnosticoMascotaController::class, 'save']);
    Route::delete('/{id}', [DiagnosticoMascotaController::class, 'delete']);
});

Route::prefix('examenAuxiliarMascota')->group(function () {
    Route::post('/', [ExamenAuxiliarMascotaController::class, 'save']);
    Route::delete('/{id}', [ExamenAuxiliarMascotaController::class, 'delete']);
});

Route::prefix('evento')->group(function () {
    Route::post('/', [EventoController::class, 'store']);
    Route::put('/{id}', [EventoController::class, 'update']);
});

Route::prefix('movimientos')->group(function () {
    Route::get('/{modulo}', [MovimientoController::class, 'findAll']);

});




