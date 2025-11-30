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
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); // Usa 'id' por convención de Laravel
            $table->string('titulo', 200);
            $table->unsignedBigInteger('autor_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('isbn', 255)->unique()->nullable(); // Añadido
            $table->string('editorial', 150)->nullable();
            $table->decimal('precio', 10, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->date('fecha_publicacion')->nullable();
            $table->text('descripcion')->nullable();
            $table->longText('imagen')->nullable();
            $table->timestamps();

            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
