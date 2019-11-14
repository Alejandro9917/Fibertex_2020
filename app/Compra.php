<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'm03_ordenes_compras';

    protected $fillable = [
        'cod_orden_compra', 'cod_empleado_solicita', 'cod_empleado_autoriza', 'cod_empresa', 'cod_producto', 'num_precio', 'num_subtotal', 
        'num_total', 'num_iva', 'num_cantidad_pedida', 'num_cantidad_recibida', 'fecha_req', 'estado', 'created_at', 'updated_at'
    ];

    //Relacion con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'cod_empresa', 'cod_empresa');
    }

    //Relacion con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto', 'cod_producto');
    }

    //Relacion con usuario que solicita
    public function usuario_s()
    {
        return $this->belongsTo(User::class, 'cod_empleado_solicita', 'cod_usuario');
    }

    //Relacion con usuario que autoriza
    public function usuario_a()
    {
        return $this->belongsTo(User::class, 'cod_empleado_autoriza', 'cod_usuario');
    }
}
