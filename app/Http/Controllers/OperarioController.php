<?php

namespace App\Http\Controllers;

use App\Operario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperarioController extends Controller
{
    public function ver_empleados()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001' || Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            {
                $empleados = Operario::get();
                return view('Operarios.ver_operarios')->with('empleados', $empleados);
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

    public function nuevo_empleado()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001')
            {
                return view('Operarios.nuevo_operario');
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

    public function crear(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'cod_empleado' => 'required|max:5', 
                'str_nombres' => 'required|max:50', 
                'str_apellidos' => 'required|max:50', 
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('nuevo_empleado')->withErrors($validator)
                ->withInput();
            }
    
            Operario::create([
                'cod_empleado' => $request->cod_empleado, 
                'str_nombres' => $request->str_nombres, 
                'str_apellidos' => $request->str_apellidos, 
            ]);
    
            return redirect()->route('ver_empleados');
        }
        
        else
        {
            return redirect('/');
        }
    }

    //Funcion para buscar a los operarios por su codigo
    public function buscar(Request $request)
    {
        if(Auth::check())
        {
            $validator = Validator::make($request->all(), [
                'cod_empleado' => 'required|max:5', 
            ]);

            $empleados = Operario::where('cod_empleado', 'like', '%'.$request->cod_empleado.'%')->get();
            return view('Operarios.ver_operarios')->with('empleados', $empleados);
        }
        
        else
        {
            return redirect('/');
        }
    }
}
