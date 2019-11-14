<?php

use Illuminate\Database\Seeder;

class m01_productos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m01_productos')->insert([
            'cod_producto' => 'PR001',
            'nbr_producto' => 'Tela rosada',
            'str_descripcion' => 'Tela de color rosada',
            'num_peso' => 52.03,
            'num_cantidad' => 10,
            'str_color' => 'Rosado',
            'str_etiquetado' => '8547621',
            'str_ubicacion' => 'Banda',
            'estado' => 'A'
        ]);

        DB::table('m01_productos')->insert([
            'cod_producto' => 'PR002',
            'nbr_producto' => 'Tela gris',
            'str_descripcion' => 'Tela de color gris',
            'num_peso' => 41,
            'num_cantidad' => 7,
            'str_color' => 'Gris',
            'str_etiquetado' => '8548521',
            'str_ubicacion' => 'Mesa',
            'estado' => 'A'
        ]);
    }
}
