<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assunto;
use App\Carreira;
use App\Profissao;
use Illuminate\Support\Facades\Auth;

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
        $assuntos = $assuntos->get();
        $dados = array();
        foreach(Auth::user()->assuntos as $assuntoUser)
        {
            foreach($assuntos as $assunto)
            {
                if($assunto->id_assunto != $assuntoUser->id_assunto)
                {
                    $dados[] = $assunto;
                }
            }
        }
        return json_encode($dados);
    }

    public function cadastrarAssunto()
    {
        $assuntos = Assunto::where('ds_active_assunto', '=', 1)->get();
        $carreiras = Carreira::where('ds_active_carreira', '=', 1)->get();
        $profissoes = Profissao::where('ds_active_profissao', '=', 1)->get();
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
