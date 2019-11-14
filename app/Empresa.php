<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'm01_empresas';

    protected $fillable = [
        'cod_empresa', 'str_nombre', 'str_rubro', 'str_telefono', 'str_direccion', 'str_nit', 
    ];

}
