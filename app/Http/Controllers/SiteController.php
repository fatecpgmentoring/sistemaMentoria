<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Mentorado;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $mentores = Mentor::orderBy('vl_nota', 'desc')->limit(6)->get();
        return view('site.homepage.index', compact('mentores'));
    }

    public function logIn(Request $request)
    {
        $this->validate($request, Usuario::$regras, Usuario::$mensagens);
        $usuario = Usuario::where('email', $request->email)->first();
        $credenciais = $request->only('email', 'password');
        if(Auth::attempt($credenciais))
        {
            if($usuario->cd_role == 2)
            {
                $mentor = Mentor::where('usuario_id_usuario', $usuario->id_usuario)->first();
                $request->session()->push('usuario', $mentor);
                return redirect('/mentor');
            }
            else if($usuario->cd_role == 1)
            {
                $mentorado = Mentorado::where('usuario_id_usuario', $usuario->id_usuario)->first();
                $request->session()->push('usuario', $mentorado);
                return redirect('/mentorado');
            }
            else
                return redirect('/admin');
        }
        else
        {
            return redirect('/loginAdmin')->with('failure', 'Senha incorreta');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
