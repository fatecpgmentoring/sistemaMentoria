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
            $usuario->assuntos()->attach(intval($assunto));
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
        return view('painel-mentor.minha-conta.cadastrar-assuntos', compact('profissoes', 'carreiras', 'assuntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
