<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M02Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id')->index();
            $table->string('cod_usuario', 5)->unique();  
            $table->string('password', 255);     
            $table->string('cod_tipo_usuario', 5);
            $table->string('str_nombres', 25);
            $table->string('str_apellidos', 35);
            $table->string('str_telefono', 8)->unique();
            $table->string('str_doc_id', 10)->unique();
            $table->string('sexo', 1);     
            $table->string('estado', 1);
            $table->date('fec_clave');
            $table->rememberToken();
            $table->timestamps();

            //$table->foreign('cod_departamento')->references('cod_departamento')->on('m01_departamentos');
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
