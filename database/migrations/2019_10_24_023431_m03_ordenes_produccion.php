<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M03OrdenesProduccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m03_ordenes_produccion', function (Blueprint $table)
        {
            $table->string('cod_orden_produccion', 5)->unique();
            $table->string('cod_producto', 5);
            $table->string('cod_usuario_cumplimiento', 5);
            $table->string('cod_empleado', 5);
            $table->string('str_materiales', 50);
            $table->double('num_gastos_indirectos', 5, 2);
            $table->double('num_gatos_directos', 6, 2);
            $table->double('num_cantidad', 5, 2);
            $table->string('str_especificaciones', 50);
            $table->double('str_costo_total_produccion', 5, 2);
            $table->string('estado', 1);
            $table->timestamps();

            $table->foreign('cod_producto')->references('cod_producto')->on('m01_productos');
            $table->foreign('cod_usuario_cumplimiento')->references('cod_usuario')->on('users');
            $table->foreign('cod_empleado')->references('cod_empleado')->on('m01_empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
