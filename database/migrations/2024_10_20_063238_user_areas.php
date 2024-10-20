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
        Schema::create('user_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('areas_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('area_id')
            ->references('id')->on('areas');

            $table->foreign('user_id')
            ->references('id')->on('users');
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
