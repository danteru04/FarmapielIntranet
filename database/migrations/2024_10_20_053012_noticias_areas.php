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
        //
        Schema::create('noticias_areas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_noticia');
            $table->text('contenido');
            $table->unsignedBigInteger('area_id');
            $table->string('imagen_path')->nullable();
            $table->unsignedBigInteger('publicado_por');
            $table->dateTime('fecha_de_entrada');

            $table->foreign('area_id')
            ->references('id')->on('areas')->onDelete('cascade');

            $table->foreign('publicado_por')
            ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
