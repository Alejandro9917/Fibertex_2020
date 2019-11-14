<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use App\ProductoDenegado;
use App\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompraController extends Controller
{
    public function nueva_compra($id)
    {
        if(Auth::check())
        {
            $dato = ['cod_producto' => $id];
            $empresas = Empresa::get();
            return view('Compras.nueva_compra')->with('dato', $dato)->with('empresas', $empresas);
        }     

        else
        {
            return redirect('/');
        }
    }

    public function ver_compras()
    {  
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            {
                $compras = Compra::get();
                return view('Compras.ver_compras')->with('compras', $compras);
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

    //Funcion para aceptar las compras
    public function recibir_compra($id)
    {
        if(Auth::check())
        {
            $orden = Compra::where('cod_orden_compra', $id)->first();
            if($orden != null)
            {
                return view('Compras.recibir_compra')->with('orden', $orden);
            }

            else
            {
                return redirect()->route('ver_compras');
            }
        }     

        else
        {
            return redirect('/');
        }    
    }

    //Metodo para ingresar ordenes de compras de producto
    public function crear_compra(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'cod_orden_compra' => 'required|max:5', 
                'cod_empresa' => 'required|max:5', 
                'cod_producto' => 'required|max:5', 
                'fecha_req' => 'required', 
                'num_cantidad_pedida' => 'required|numeric', 
                'num_precio' => 'required|numeric', 
                'num_subtotal' => 'required|numeric', 
                'num_iva' => 'required|numeric', 
                'num_total' => 'required|numeric', 
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('ver_compras')->withErrors($validator)
                ->withInput();
            }
    
            Compra::create([
                'cod_orden_compra' => $request->cod_orden_compra, 
                'cod_empresa' => $request->cod_empresa, 
                'cod_producto' => $request->cod_producto, 
                'cod_empleado_solicita' => Auth::User()->cod_usuario, 
                'fecha_req' => $request->fecha_req, 
                'num_cantidad_pedida' => $request->num_cantidad_pedida, 
                'num_precio' => $request->num_precio, 
                'num_subtotal' => $request->num_subtotal, 
                'num_iva' => $request->num_iva, 
                'num_total' => $request->num_total,
                'estado' => 'P' 
                ]);
    
            return redirect()->route('ver_compras');
        }     

        else
        {
            return redirect('/');
        }          
    }

    //Metodo para evaluar la compra 
    public function evaluar_compra($id, $op)
    {
        if(Auth::check())
        {
            //Para denegar orden de compra
            if($op == 0)
            {
                Compra::where('cod_orden_compra', $id)->update(['cod_empleado_autoriza' => Auth::User()->cod_usuario, 'estado' => 'D']);
                return redirect()->route('ver_compras');
            }

            //Para aceptar orden de compra
            else if($op == 1)
            {
                Compra::where('cod_orden_compra', $id)->update(['cod_empleado_autoriza' => Auth::User()->cod_usuario, 'estado' => 'A']);
                return redirect()->route('ver_compras');
            }
        }     

        else
        {
            return redirect('/');
        }  
    }


    //Ruta para añadir el la cantidad recibida
    public function cantidad_recibida(Request $request, $id, $ip)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'num_cantidad_recibida' => 'required|numeric', 
                'num_cantidad_denegada' => 'required|numeric',
            ]);

            $cantidad = Producto::where('cod_producto', $ip)->select('num_cantidad')->first();
            $cantidad = $cantidad->num_cantidad + $request->num_cantidad_recibida;

            /*if ($validator->fails()) {
                return redirect()->route('recibir_compra')->withErrors($validator)
                ->withInput();
            }*/

            Compra::where('cod_orden_compra', $id)->update(['num_cantidad_recibida' => $request->num_cantidad_recibida, 'estado' => 'F']);
            Producto::where('cod_producto', $ip)->update(['num_cantidad' => $cantidad]);
            ProductoDenegado::create([
                'cod_producto_denagado' => 'PD'.uniqid(),
                'cod_producto' => $ip,
                'cod_orden_produccion' => null,
                'cod_orden_compra' => $id,
                'num_producto_denegado' => $request->num_cantidad_denegada,
                'str_motivos' => $request->str_motivos,
            ]);

            return redirect()->route('ver_compras');
        }     

        else
        {
            return redirect('/');
        }  
    }
}
