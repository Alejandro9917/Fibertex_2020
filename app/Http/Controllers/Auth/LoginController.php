<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        /*$fields = $this->validate($request,[
            'nbr_usuario' => 'required|min:8'
        ]);*/

        $credentials = $request->only('cod_usuario', 'password');

        if(Auth::attempt($credentials, true))
        {
            return redirect()->route('datos');
        }

        return redirect()->route('inicio');
    }
}
