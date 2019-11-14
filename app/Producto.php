<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'm01_productos';

    protected $fillable = [
        'cod_producto', 'nbr_producto', 'str_descripcion', 'num_peso', 'num_cantidad', 'str_color', 'str_etiquetado', 'str_ubicacion', 'estado', 'created_at', 'updated_at'
    ];
}
