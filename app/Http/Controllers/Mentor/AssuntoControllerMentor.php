<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Assunto;
use App\Carreira;
use App\Profissao;

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
        $assuntos = $request->car != null ? $assuntos->where('ds_active_assunto', '=', 1)->where('carreira_id_carreira', '=', $request->car) : $assuntos;
        $assuntos = $request->prof != null ? $assuntos->join('ds_active_carreira', '=', 1)->where('profissao_id_profissao', '=', $request->prof)->get();
        return json_encode($assuntos);
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
