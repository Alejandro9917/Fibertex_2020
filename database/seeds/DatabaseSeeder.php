<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('m01_empresas');
        $this->call('m01_empleados');
        $this->call('m01_productos');
        $this->call('users');
    }
}
