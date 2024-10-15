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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_noticia');
            $table->text('contenido');
            $table->string('imagen_path')->nullable();
            $table->dateTime('fecha_de_entrada');
            $table->dateTime('fecha_de_expiracion') -> nullable();
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
