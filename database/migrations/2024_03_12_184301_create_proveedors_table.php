<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFormaDePago');
            $table->string('Proveedor',60);
            $table->string('NumeroTributario',20);
            $table->string('TelefonoFijo',40);
            $table->string('TelefonoMovil',40)->nullable();
            $table->string('Email',60)->nullable();
            $table->string('Web',60)->nullable();
            $table->string('Direccion',60)->nullable();
            $table->string('CuentaBancaria',60)->nullable();
            $table->string('Contacto',60)->nullable();
            $table->string('Observacion',60)->nullable();
            $table->timestamps();

            $table->foreign('idFormaDePago')->references('id')->on('formaDePagos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
