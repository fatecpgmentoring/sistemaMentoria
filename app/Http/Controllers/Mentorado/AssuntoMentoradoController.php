<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assunto;
use App\Carreira;
use App\Profissao;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\json_encode;
use App\Usuario;

class AssuntoMentoradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function carregaAssunto(Request $request)
    {
        $assuntos = Assunto::where('ds_active_assunto', '=', 1);
        if($request->prof != null)
            $assuntos->join('tb_carreiras', 'id_carreira', '=', 'carreira_id_carreira')->where('profissao_id_profissao', '=', $request->prof);
        if($request->car != null)
            $assuntos = $assuntos->where('carreira_id_carreira', '=', $request->car);
        $assuntosArray = array();
        foreach(Auth::user()->assuntos as $assunto)
        {
            $assuntosArray[] = $assunto->id_assunto;
        }
        $assuntos = Assunto::whereNotIn('id_assunto', $assuntosArray)->get();
        return json_encode($assuntos);
    }

    public function carregaMeusAssuntos(Request $request)
    {
        return json_encode(Auth::user()->assuntos);
    }

    public function salvarAssunto(Request $request)
    {
        $assuntos = $request->input('assuntos');
        $usuario = Usuario::find(Auth::user()->id_usuario);
        foreach($assuntos as $assunto)
        {
            $assunto = Assunto::find(intval($assunto))->usuarios()->save($usuario);
        }
        return json_encode("OK");
    }

    public function removerAssunto(Request $request)
    {
        $assuntos = $request->input('assuntos');
        $usuario = Usuario::find(Auth::user()->id_usuario);
        foreach($assuntos as $assunto)
        {
            $usuario->assuntos()->detach($assunto);
        }
        return json_encode("OK");
    }

    public function cadastrarAssunto()
    {
        $carreiras = Carreira::where('ds_active_carreira', '=', 1)->get();
        $profissoes = Profissao::where('ds_active_profissao', '=', 1)->get();
        $assuntosArray = array();
        foreach(Auth::user()->assuntos as $assunto)
        {
            $assuntosArray[] = $assunto->id_assunto;
        }
        $assuntos = Assunto::where('ds_active_assunto', '=', 1)->whereNotIn('id_assunto', $assuntosArray)->get();
        return view('painel-mentorado.minha-conta.cadastrar-assuntos', compact('profissoes', 'carreiras', 'assuntos'));
    }

   function cadastrarAssuntoMentorado(Request $request)
   {
       $assunto = $request->dados["assunto"];
       $carreira = intval($request->dados["carreira"]);
       $mentorado = $request->session()->get('usuario.0');
       $assunto = new Assunto([
           'nm_assunto' => $assunto,
           'carreira_id_carreira' => $carreira,
           'ds_active_assunto' => 0,
           'assunto_log' => 'Cadatrado por '.$mentorado->nm_mentorado.' (ID='.$mentorado->id_mentorado.')'
       ]);
       try
       {
           $assunto->save();
           return json_encode(array('status' => 'success', 'dados' => $assunto));
       }
       catch(QueryException $ex)
       {
           return json_encode(array('status' => 'failure', 'dados' => $assunto));
       }
   }

}
