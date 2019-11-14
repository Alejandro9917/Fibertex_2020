<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M03OrdenesCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m03_ordenes_compras', function (Blueprint $table)
        {
            $table->string('cod_orden_compra', 5)->unique();
            $table->string('cod_empleado_solicita', 5);
            $table->string('cod_empleado_autoriza', 5)->nullable();  
            $table->string('cod_empresa', 5);
            $table->string('cod_producto', 5);
            $table->double('num_precio', 5, 2);
            $table->double('num_subtotal', 6, 2);
            $table->double('num_total', 6, 2);
            $table->double('num_iva', 5, 2);
            $table->double('num_cantidad_pedida', 5, 2);
            $table->double('num_cantidad_recibida', 5, 2)->nullable();
            $table->date('fecha_req');
            $table->string('estado', 1);
            $table->timestamps();

            $table->foreign('cod_empleado_solicita')->references('cod_empleado_solicita')->on('users');
            $table->foreign('cod_empleado_autoriza')->references('cod_empleado_autoriza')->on('users');
            $table->foreign('cod_empresa')->references('cod_empresa')->on('m01_empresas');
            $table->foreign('cod_producto')->references('cod_producto')->on('m01_productos');         
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
