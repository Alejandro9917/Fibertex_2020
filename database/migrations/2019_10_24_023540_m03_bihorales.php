<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M03Bihorales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m03_bihorales', function (Blueprint $table)
        {
            $table->string('cod_bihoral', 5)->index();
            $table->string('cod_empleado', 5);
            $table->string('cod_usuario', 5);
            $table->string('cod_producto', 5);
            $table->boolean('lsv_rechazo');
            $table->string('str_descripcion', 200);
            $table->timestamps();

            $table->foreign('cod_empleado')->references('cod_empleado')->on('m01_empleados');
            $table->foreign('cod_usuario')->references('cod_usuario')->on('m02_usuarios');
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
