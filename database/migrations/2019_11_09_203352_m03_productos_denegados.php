<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M03ProductosDenegados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m03_productos_denegados', function (Blueprint $table)
        {
            $table->string('cod_producto_denagado', 15)->index();
            $table->string('cod_producto', 5);
            $table->string('cod_orden_produccion', 5)->nullable();
            $table->string('cod_orden_compra', 5)->nullable();
            $table->double('num_producto_denegado', 5, 2);
            $table->string('str_motivos', 200)->nullable();
            $table->timestamps();

            $table->foreign('cod_orden_produccion')->references('cod_orden_produccion')->on('m03_ordenes_produccion');
            $table->foreign('cod_orden_compra')->references('cod_orden_compra')->on('m03_ordenes_compras');
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
