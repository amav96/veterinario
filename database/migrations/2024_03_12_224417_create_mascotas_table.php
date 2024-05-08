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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCliente'); 
            $table->unsignedBigInteger('idEspecie');
            $table->unsignedBigInteger('idRaza');
            $table->unsignedBigInteger('idFrecuencia')->nullable();
            $table->unsignedBigInteger('idDiaPreferido')->nullable();
            $table->string('Mascota',60);
            $table->date('FechaNacimiento');
            $table->string('Microchip',40)->nullable();
            $table->string('Sexo',30)->nullable();
            $table->boolean('Esterilizado')->nullable();
            $table->boolean('Asegurado')->nullable();
            $table->string('Notas',200)->nullable();  
            $table->string('Grooming')->nullable();
            $table->timestamps();

            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->foreign('idEspecie')->references('id')->on('especies');
            $table->foreign('idRaza')->references('id')->on('razas');
            $table->foreign('idFrecuencia')->references('id')->on('frecuencias');
            $table->foreign('idDiaPreferido')->references('id')->on('diaPreferidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
