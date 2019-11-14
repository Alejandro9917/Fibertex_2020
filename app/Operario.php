<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operario extends Model
{
    protected $table = 'm01_empleados';

    protected $fillable = [
        'cod_empleado', 'str_nombres', 'str_apellidos', 'created_at', 'updated_at'
    ];
}
