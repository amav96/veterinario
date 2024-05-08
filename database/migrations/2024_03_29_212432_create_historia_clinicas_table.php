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
        Schema::create('historiaClinicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMascota'); 
            $table->timestamps();

            $table->foreign('idMascota')->references('id')->on('mascotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiaClinicas');
    }
};
