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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCliente'); 
            $table->unsignedBigInteger('idMascota');
            $table->unsignedBigInteger('idTipoEvento');
            $table->unsignedBigInteger('idEstadoEvento');
            $table->unsignedBigInteger('idUsuario'); 
            $table->unsignedBigInteger('idNotificacion'); 
            $table->string('Evento',60);
            $table->dateTime('FechaInicio');
            $table->dateTime('FechaFin');
            $table->string('Observacion',200);
            $table->string('Color',20);
            $table->boolean('Notificacion');
            $table->timestamps();

            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->foreign('idMascota')->references('id')->on('mascotas');
            $table->foreign('idTipoEvento')->references('id')->on('tipos_eventos');
            $table->foreign('idEstadoEvento')->references('id')->on('estados_eventos');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idNotificacion')->references('id')->on('notificaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
