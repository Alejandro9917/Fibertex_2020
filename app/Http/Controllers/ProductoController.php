<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Produccion;
use App\ProductoDenegado;
use App\Operario;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function ver()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario != 'TU001')
            {
                $productos = Producto::get();
                return view('Productos.ver_productos')->with('productos', $productos);
            }

            else
            {
                return redirect()->route('datos');
            } 
        }
        
        else
        {
            return redirect('/');
        }
    }

    public function nuevo_producto()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            {
                return view('Productos.nuevo_producto');
            }

            else
            {
                return redirect()->route('datos');
            }        
        }
        
        else
        {
            return redirect('/');
        }     
    }

    public function crear_producto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cod_producto' => 'required|max:5', 
            'nbr_producto' => 'required|max:50', 
            'str_descripcion' => 'required|max:150', 
            'num_peso' => 'required|numeric', 
            'num_cantidad' => 'required|numeric', 
            'str_color' => 'required|max:50', 
            'str_etiquetado' => 'required|max:50', 
            'str_ubicacion' => 'required', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('nuevo_producto')->withErrors($validator)
            ->withInput();
        }

        Producto::create([
            'cod_producto' => $request->cod_producto, 
            'nbr_producto' => $request->nbr_producto, 
            'str_descripcion' => $request->str_descripcion, 
            'num_peso' => $request->num_peso, 
            'num_cantidad' => $request->num_cantidad, 
            'str_color' => $request->str_color, 
            'str_etiquetado' => $request->str_etiquetado, 
            'str_ubicacion' => $request->str_ubicacion, 
            'estado' => 1
        ]);

        return redirect()->route('ver_productos');
    }

    public function orden_produccion($id)
    {
        if(Auth::check())
        {
            $dato = ['cod_producto' => $id];
            $operarios = Operario::get();
            $usuarios = User::get();
            return view('Productos.orden_produccion')->with('dato', $dato)->with('operarios', $operarios)->with('usuarios', $usuarios);
        }
        
        else
        {
            return redirect('/');
        }  
    }

    //Metodo para ingresar ordenes de produccion
    public function crear_produccion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cod_orden_produccion' => 'required|max:5', 
            'cod_producto' => 'required', 
            'str_materiales' => 'required|max:50', 
            'num_gastos_indirectos' => 'required|numeric', 
            'num_gatos_directos' => 'required|numeric', 
            'num_cantidad' => 'required|numeric', 
            'str_especificaciones' => 'required|max:50', 
            'str_costo_total_produccion' => 'required|numeric', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('nueva_produccion')->withErrors($validator)
            ->withInput();
        }

        Produccion::create([
            'cod_orden_produccion' => $request->cod_orden_produccion, 
            'cod_producto' => $request->cod_producto, 
            'cod_usuario_cumplimiento' => $request->cod_usuario_cumplimiento, 
            'cod_empleado' => $request->cod_empleado, 
            'str_materiales' => $request->str_materiales, 
            'num_gastos_indirectos' => $request->num_gastos_indirectos, 
            'num_gatos_directos' => $request->num_gatos_directos, 
            'num_cantidad' => $request->num_cantidad, 
            'str_especificaciones' => $request->str_especificaciones, 
            'str_costo_total_produccion' => $request->str_costo_total_produccion, 
            'estado' => 'P',
            ]);

        return redirect()->route('ver_produccion');
    }

    public function ver_produccion()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU004')
            {
                $produccion = Produccion::get();
                return view('Productos.ver_produccion')->with('producciones', $produccion);
            }

            else
            {
                return redirect()->route('datos');
            }          
        }
        
        else
        {
            return redirect('/');
        }  
    }

    public function requerimientos()
    {
        if(Auth::check())
        {
            return view('Productos.requerimientos');
        }
        
        else
        {
            return redirect('/');
        }  
    }

    //Funcion para actualizar los datos de las ordenes de produccion
    public function recibir_produccion($id)
    {
        if(Auth::check())
        {
            $orden = Produccion::where('cod_orden_produccion', $id)->first();
            if($orden != null)
            {
                return view('Productos.recibir_produccion')->with('orden', $orden);
            }

            else
            {
                return redirect()->route('ver_produccion');
            }
        }
        
        else
        {
            return redirect('/');
        }  
    }

    //Funcion para actualizar la produccion
    public function cantidad_producida(Request $request, $id, $ip)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'cantidad_aprobada' => 'required|numeric',
                'cantidad_denegada' => 'required|numeric', 
            ]);

            $cantidad = Producto::where('cod_producto', $ip)->select('num_cantidad')->first();
            $cantidad = $cantidad->num_cantidad + $request->cantidad_aprobada;

            Produccion::where('cod_orden_produccion', $id)->update(['estado' => 'F']);
            Producto::where('cod_producto', $ip)->update(['num_cantidad' => $cantidad]);
            ProductoDenegado::create([
                'cod_producto_denagado' => 'PD'.uniqid(),
                'cod_producto' => $ip,
                'cod_orden_produccion' => $id,
                'cod_orden_compra' => null,
                'num_producto_denegado' => $request->cantidad_denegada,
                'str_motivos' => $request->str_motivos,
            ]);

            return redirect()->route('ver_produccion');
        }
        
        else
        {
            return redirect('/');
        }  
    }

    //Funcion para ver los rechazos de produccion
    public function rechazos_produccion()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU005')
            {
                $denegados = ProductoDenegado::where('cod_orden_compra', null)->get();
                return view('Productos.rechazos')->with('denegados', $denegados);
            }

            else
            {
                return redirect()->route('datos');
            }          
        }
        
        else
        {
            return redirect('/');
        }  
    }

    public function rechazos_compra()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU005')
            {
                $denegados = ProductoDenegado::where('cod_orden_produccion', null)->get();
                return view('Compras.rechazos')->with('denegados', $denegados);
            }

            else
            {
                return redirect()->route('datos');
            }          
        }
        
        else
        {
            return redirect('/');
        }  
    }
}
