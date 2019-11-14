<?php

use Illuminate\Database\Seeder;

class m01_empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m01_empresas')->insert([
            'cod_empresa' => 'EM001',
            'str_nombre' => 'Telas S.A. de C.V.',
            'str_rubro' => 'Mercadeo de telas',
            'str_telefono' => '22574967',
            'str_direccion' => 'En algún lugar del mundo',
            'str_nit' => '852147963123'
        ]);
    }
}
