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
        Schema::create('googleUsers', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->double('precio');
            $table->string('cantidad');
            $table->string('unidad_medida');
            $table->string('descripcion_producto');
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
