<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        DB::table('users')->insert([
            'cod_usuario' => 'User1',
            'password' => bcrypt('12345'),
            'cod_tipo_usuario' => 'TU001',
            'str_nombres' => 'Miguel',
            'str_apellidos' => 'Meléndez',
            'str_telefono' => '71485058',
            'str_doc_id' => '059144869',
            'sexo' => 'M',
            'estado' => 'A',
            'fec_clave' => '2019/10/26',
        ]);
        
        //Gerente general
        DB::table('users')->insert([
            'cod_usuario' => 'User2',
            'password' => bcrypt('12345'),
            'cod_tipo_usuario' => 'TU002',
            'str_nombres' => 'Alejandro',
            'str_apellidos' => 'Martínez',
            'str_telefono' => '25574967',
            'str_doc_id' => '059144868',
            'sexo' => 'M',
            'estado' => 'A',
            'fec_clave' => '2019/10/26',
        ]);

        //Gerente
        DB::table('users')->insert([
            'cod_usuario' => 'User3',
            'password' => bcrypt('12345'),
            'cod_tipo_usuario' => 'TU003',
            'str_nombres' => 'Gabriela',
            'str_apellidos' => 'Méndez',
            'str_telefono' => '22540871',
            'str_doc_id' => '852741369',
            'sexo' => 'F',
            'estado' => 'A',
            'fec_clave' => '2019/10/26',
        ]);

        //Jefe de produccion
        DB::table('users')->insert([
            'cod_usuario' => 'User4',
            'password' => bcrypt('12345'),
            'cod_tipo_usuario' => 'TU004',
            'str_nombres' => 'Erick',
            'str_apellidos' => 'Arevalo',
            'str_telefono' => '72584122',
            'str_doc_id' => '123456789',
            'sexo' => 'F',
            'estado' => 'A',
            'fec_clave' => '2019/10/26',
        ]);

        //Jefe de calidad
        DB::table('users')->insert([
            'cod_usuario' => 'User5',
            'password' => bcrypt('12345'),
            'cod_tipo_usuario' => 'TU005',
            'str_nombres' => 'Roberto',
            'str_apellidos' => 'Funes',
            'str_telefono' => '64512365',
            'str_doc_id' => '001154783',
            'sexo' => 'F',
            'estado' => 'A',
            'fec_clave' => '2019/10/26',
        ]);
    }
}
