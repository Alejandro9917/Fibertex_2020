<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'm03_ordenes_produccion';

    protected $fillable = [
        'cod_orden_produccion', 'cod_producto', 'cod_usuario_cumplimiento', 'cod_empleado', 'str_materiales', 'num_gastos_indirectos', 'num_gatos_directos', 
        'num_cantidad', 'str_especificaciones', 'str_costo_total_produccion', 'estado', 'created_at', 'updated_at'
    ];

    //Relacion con productos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto', 'cod_producto');
    }

    //Relacion con usuario de cumplimiento
    public function usuario()
    {
        return $this->belongsTo(User::class, 'cod_usuario_cumplimiento', 'cod_usuario');
    }

    //Relacion con el operario
    public function operario()
    {
        return $this->belongsTo(Operario::class, 'cod_empleado', 'cod_empleado');
    }
}
