<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assunto;
use App\Carreira;
use App\Profissao;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;
use App\Usuario;

class AssuntoControllerMentor extends Controller
{
    public function carregaAssunto(Request $request)
    {
        $assuntos = Assunto::where('ds_active_assunto', '=', 1);
        if ($request->prof != null)
            $assuntos->join('tb_carreiras', 'id_carreira', '=', 'carreira_id_carreira')->where('profissao_id_profissao', '=', $request->prof);
        if ($request->car != null)
            $assuntos = $assuntos->where('carreira_id_carreira', '=', $request->car);
        $assuntosArray = array();
        foreach (Auth::user()->assuntos as $assunto) {
            $assuntosArray[] = $assunto->id_assunto;
        }
        $assuntos = $assuntos->whereNotIn('id_assunto', $assuntosArray)->get();
        return json_encode(array('assuntos' => $assuntos->toArray()));
    }

    public function salvarAssunto(Request $request)
    {
        $assuntos = $request->input('assuntos');
        $usuario = Usuario::find(Auth::user()->id_usuario);
        foreach ($assuntos as $assunto) {
            $usuario->assuntos()->attach(intval($assunto));
        }
        return json_encode("OK");
    }

    public function removerAssunto(Request $request)
    {
        $assuntos = $request->input('assuntos');
        $usuario = Usuario::find(Auth::user()->id_usuario);
        foreach ($assuntos as $assunto) {
            $usuario->assuntos()->detach($assunto);
        }
        return json_encode("OK");
    }

    public function cadastrarAssunto()
    {
        $carreiras = Carreira::where('ds_active_carreira', '=', 1)->get();
        $profissoes = Profissao::where('ds_active_profissao', '=', 1)->get();
        $assuntosArray = array();
        foreach (Auth::user()->assuntos as $assunto) {
            $assuntosArray[] = $assunto->id_assunto;
        }
        $assuntos = Assunto::where('ds_active_assunto', '=', 1)->whereNotIn('id_assunto', $assuntosArray)->get();
        return view('painel-mentor.minha-conta.cadastrar-assuntos', compact('profissoes', 'carreiras', 'assuntos'));
    }

    function cadastrarAssuntoMentor(Request $request)
    {
        $assunto = $request->assunto;
        $carreira = intval($request->carreira);
        $mentor = $request->session()->get('usuario.0');
        $assunto = new Assunto([
            'nm_assunto' => $assunto,
            'carreira_id_carreira' => $carreira,
            'ds_active_assunto' => 0,
            'assunto_log' => 'Cadatrado por ' . $mentor->nm_mentor . ' (ID=' . $mentor->id_mentor . ')'
        ]);
        try {
            $assunto->save();
            return json_encode(array('status' => 'success', 'dados' => $assunto));
        } catch (QueryException $ex) {
            return json_encode(array('status' => 'failure', 'dados' => $assunto));
        }
    }
}