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
        Schema::create('detalle_ventas', function (Blueprint $table) {
         $table->id('id_detalle');
        $table->unsignedBigInteger('id_venta');
        $table->unsignedBigInteger('id_libro');
        $table->integer('cantidad')->default(1);
        $table->decimal('precio_unitario',10,2)->default(0);
        $table->timestamps();

        $table->foreign('id_venta')->references('id_venta')->on('ventas');
        $table->foreign('id_libro')->references('id_libro')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
