<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M02Auditorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m02_auditorias', function (Blueprint $table)
        {
            $table->string('cod_auditoria', 5)->index();
            $table->string('cod_auditor', 5);
            $table->string('cod_empleado', 5);
            $table->string('str_area', 20);
            $table->string('img_firma', 200);
            $table->string('str_periodo', 50);
            $table->string('str_lista_comprobacion', 50);
            $table->timestamps();

            $table->foreign('cod_auditor')->references('cod_auditor')->on('m01_auditores');
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
