<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M02RegistrosStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m02_registros_stock', function (Blueprint $table)
        {
            $table->string('cod_registro', 5)->index();
            $table->string('cod_producto', 5);
            $table->double('num_cantidad', 5, 2);
            $table->date('fec_entrada');
            $table->date('fec_actualizacion');

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
