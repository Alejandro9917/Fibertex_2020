<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class M02FacturasCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m02_facturas_compras', function (Blueprint $table)
        {
            $table->string('cod_factura_compra', 5)->index();
            $table->string('cod_empresa', 5);
            $table->string('cod_producto', 5);
            $table->double('num_cantidad', 5, 2);
            $table->double('num_medida', 5, 2);
            $table->double('num_monto', 6, 2);
            $table->double('num_iva', 5, 2);
            $table->double('num_subtotal', 6, 2);
            $table->timestamps();

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
