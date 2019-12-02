<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function ver_usuarios()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001' || Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            {
                $usuarios = User::get();
                return view('Usuarios.ver_usuarios')->with('usuarios', $usuarios);
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

    public function datos()
    {
        if(Auth::check())
        {
            $date1 = new DateTime(Auth::User()->fec_clave);
            $date2 = new DateTime(date('Y/m/d'));
            $diff = $date1->diff($date2);

            if($diff->days >= 90)
            {
                return view('Usuarios.clave');
            }

            else
            {
                return view('Usuarios.datos');
            }            
        }
        
        else
        {
            return redirect('/');
        }
    }

    //Función para actualizar clave
    public function clave_act(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clave1' => 'required',
            'clave2' => 'required', 
        ]);

        if($request->clave1 == $request->clave2)
        {
            User::where('cod_usuario', Auth::User()->cod_usuario)->update(['password' => bcrypt($request->clave1)]);
            User::where('cod_usuario', Auth::User()->cod_usuario)->update(['fec_clave' => date('Y/m/d')]);
            return view('Usuarios.datos');
        }

        else
        {
            return view('Usuarios.clave');
        }
    }

    public function crear()
    {
        if(Auth::check())
        {
            if(Auth::User()->cod_tipo_usuario == 'TU001')
            {
                
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
