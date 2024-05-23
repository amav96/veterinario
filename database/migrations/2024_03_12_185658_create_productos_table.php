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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProveedor');
            $table->unsignedBigInteger('idUnidadMedida');
            $table->unsignedBigInteger('idPresentacion');
            $table->unsignedBigInteger('idLinea');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idSubCategoria')->nullable();
            $table->string('Producto',60);
            $table->string('Marca',40)->nullable();
            $table->string('Contenido',40)->nullable();
            $table->string('CodigoDeBarra',60)->nullable();
            $table->integer('StockMinimo');
            $table->integer('StockMaximo');
            $table->double('PrecioReferencialCompra')->nullable();
            $table->double('PrecioVenta')->nullable();
            $table->boolean('ExoneradoCompra');
            $table->boolean('ExoneradoVenta');
            $table->timestamps();

            $table->foreign('idProveedor')->references('id')->on('proveedores');
            $table->foreign('idUnidadMedida')->references('id')->on('unidades_medidas');
            $table->foreign('idPresentacion')->references('id')->on('presentaciones');
            $table->foreign('idLinea')->references('id')->on('lineas');
            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->foreign('idSubCategoria')->references('id')->on('sub_categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
