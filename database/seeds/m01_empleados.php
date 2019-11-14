<?php

use Illuminate\Database\Seeder;

class m01_empleados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m01_empleados')->insert([
            'cod_empleado' => 'CM001',
            'str_nombres' => 'Erick',
            'str_apellidos' => 'Arevalo',
        ]);
    }
}
