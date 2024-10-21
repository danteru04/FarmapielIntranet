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
        Schema::create('blog_noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_noticia');
            $table->text('contenido');
            $table->string('imagen_path')->nullable();
            $table->string("publicado_por");
            $table->dateTime('fecha_de_entrada');
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
