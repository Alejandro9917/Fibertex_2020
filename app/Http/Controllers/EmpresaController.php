<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    //Funcion para ver las empresas
    public function ver_empresas()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001' || Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            {
                $empresas = Empresa::get();
                return view('Empresas.ver_empresas')->with('empresas', $empresas);
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

    public function nueva_empresa()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001')
            {
                return view('Empresas.nueva_empresa');
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
                'cod_empresa' => 'required|max:5', 
                'str_nombre' => 'required|max:50', 
                'str_rubro' => 'required|max:100', 
                'str_telefono' => 'required|max:8', 
                'str_direccion' => 'required|max:200', 
                'str_nit' => 'required|max:17', 
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('nueva_empresa')->withErrors($validator)
                ->withInput();
            }
    
            Empresa::create([
                'cod_empresa' => $request->cod_empresa, 
                'str_nombre' => $request->str_nombre, 
                'str_rubro' => $request->str_rubro, 
                'str_telefono' => $request->str_telefono, 
                'str_direccion' => $request->str_direccion, 
                'str_nit' => $request->str_nit, 
            ]);
    
            return redirect()->route('ver_empresas');
        }
        
        else
        {
            return redirect('/');
        }     
    }
}
