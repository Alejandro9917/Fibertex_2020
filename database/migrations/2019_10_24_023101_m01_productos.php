<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M01Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m01_productos', function (Blueprint $table)
        {
            $table->string('cod_producto', 5)->index();
            $table->string('nbr_producto', 50);
            $table->string('str_descripcion', 150);
            $table->double('num_peso', 5, 2);
            $table->double('num_cantidad', 5, 2);
            $table->string('str_color',  50);
            $table->string('str_etiquetado', 50)->unique();
            $table->string('str_ubicacion', 50);
            $table->string('estado', 1);
            $table->timestamps();
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
