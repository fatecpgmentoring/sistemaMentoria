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
            return redirect('/login')->with('failure', 'Senha incorreta');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showMentor($id)
    {
        $mentor = Mentor::find($id);
        return view('site.showMentor', compact('mentor'));
    }

    public function mentoresAll()
    {
        $mentores = Mentor::all();
        return view('site.allMentores', compact('mentores'));

    }

    public function mentorListagem(Request $request)
    {
        $mentores = new Mentor;
        $mentores = $mentores->join('tb_usuarios', 'usuario_id_usuario', '=', 'id_usuario')->where('cd_role', '=', 2)->where('cd_status', '=', 1)->where('nm_mentor', 'like', '%'.$request->search.'%' )->orderBy('vl_nota', 'desc');
        $count = $mentores->get()->count();
        $mentoresAExibir = array();
        foreach($mentores->limit(12)->offset(($request->page-1)*12)->get() as $linhaMentor)
        {
            $subMentoresAExbir = array();
            $subMentoresAExbir['id_mentor'] = $linhaMentor->id_mentor;
            $subMentoresAExbir['nm_mentor'] = $linhaMentor->nm_mentor;
            $subMentoresAExbir['vl_nota'] = $linhaMentor->vl_nota;
            $subMentoresAExbir['nv_conhecimento'] = $linhaMentor->nv_conhecimento;
            $subMentoresAExbir['ds_foto'] = $linhaMentor->ds_foto;
            $mentoresAExibir[] = $subMentoresAExbir;
        }
        return json_encode(array('dados' => $mentoresAExibir, 'qtd' => ceil($count/12)));
    }
}
