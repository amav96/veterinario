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
        
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idProvincia');
            $table->unsignedBigInteger('idDistrito');         
            $table->string('Nombre',80);
            $table->string('Apellido',80);
            $table->string('DocumentoIdentidad', 10);
            $table->date('FechaNacimiento');
            $table->string('Email',60)->nullable();
            $table->string('TelefonoFijo',10)->nullable();
            $table->string('TelefonoMovil',10)->nullable();
            $table->string('TelefonoTrabajo',10)->nullable();   
            $table->string('Direccion',200);
            $table->string('ZonaResidencia',1)->nullable();
            $table->boolean('ClienteReferido',60);
            $table->string('Observaciones',200)->nullable();
            $table->string('NombreEmpresa',100)->nullable();  
            $table->string('RegistroTributario', 20)->nullable();
            $table->string('DireccionEmpresa',200)->nullable();
            $table->string('Facebook',100)->nullable();
            $table->string('Instagram',100)->nullable();
            $table->string('ReferenciaDireccion',300)->nullable();
            $table->timestamps();

            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('idProvincia')->references('id')->on('provincias');
            $table->foreign('idDistrito')->references('id')->on('distritos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
