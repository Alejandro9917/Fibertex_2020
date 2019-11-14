<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M01Auditores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m01_auditores', function (Blueprint $table)
        {
            $table->string('cod_auditor', 5)->index();
            $table->string('nbr_empresa', 50);
            $table->string('nbr_nombres', 25);
            $table->string('nbr_apellidos', 35);
            $table->string('str_documento_id', 9);
            $table->string('lsv_tipo_doc', 20);
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
