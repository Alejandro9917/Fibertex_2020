<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M01Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m01_empresas', function (Blueprint $table)
        {
            $table->string('cod_empresa', 5)->index();
            $table->string('str_nombre', 50)->unique();
            $table->string('str_rubro', 100);
            $table->string('str_telefono', 8)->unique();
            $table->string('str_direccion', 200);
            $table->string('str_nit', 17)->unique();
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
