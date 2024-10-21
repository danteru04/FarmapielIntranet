<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_de_area');
            $table->string('descripcion')->nullable();
            $table->string('locacion');
            /* $table->unsignedBigInteger('id_jefe_de_area');


            $table->foreign('id_jefe_de_area')
            -> references('id') -> on('users'); */

        });

        DB::table('areas')->insert([
            ['nombre_de_area' => 'Sistemas',
            'descripcion' => 'Soporte Técnico y Administración de Sistemas Computarizados',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Recursos Humanos',
            'descripcion' => 'Reclutamiento y Administración de personal, candidatos y recursos humanos',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Aseguramiento de Calidad',
            'descripcion' => '',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Direccion',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Costos',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Compras',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Desarrollo',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Embaque',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Almacén',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Validacion',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Produccion',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Ecologia Higiene y Seguridad',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Almacen de Recepcion',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Almacen de Producto Terminado',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Almacen de Materia Prima',
            'locacion'=> 'SJR'],
            ['nombre_de_area' => 'Devoluciones',
            'locacion'=> 'SJR'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
