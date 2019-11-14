<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoDenegado extends Model
{
    protected $table = 'm03_productos_denegados';

    protected $fillable = [
        'cod_producto_denagado', 'cod_producto', 'cod_orden_produccion', 'cod_orden_compra', 'num_producto_denegado', 'str_motivos', 'created_at', 'updated_at'
    ];

    //Relacion con productos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto', 'cod_producto');
    }

    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'cod_orden_produccion', 'cod_orden_produccion');
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'cod_orden_compra', 'cod_orden_compra');
    }
}
