<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
            //$usuarios = User::get();
            return view('Usuarios.datos');
        }
        
        else
        {
            return redirect('/');
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
