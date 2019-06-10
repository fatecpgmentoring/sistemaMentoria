<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conexao;
use function GuzzleHttp\json_encode;
use App\Mentorado;

class ConexaoController extends Controller
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
        $mentorado = $request->session()->get('usuario.0');
        $conexao = new Conexao([
            'mentorado_id_mentorado' => $mentorado->id_mentorado,
            'mentor_id_mentor' => $request->params["mentor"],
            'assunto_id_assunto' => intval($request->params["assunto"]),
            'ds_status' => 0
        ]);

        $conexao->save();
        return json_encode($conexao);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conexao = Conexao::find(intval($request->conexao));
        try {
            $conexao->delete();
            return json_encode('Ok');
        } catch (QueryException $ex) {
            return json_encode('Erro');
        }
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
    public function update(Request $request)
    {
        $conexao = Conexao::find($request->params['conexao']);
        $conexao->ds_status = 0;
        $conexao->dt_inicio = null;
        $conexao->dt_fim = null;
        $conexao->update();
        return json_encode($conexao);
    }

    public function conexoes(Request $request)
    {
        $mentores = $this->getConexoes($request);
        return view('painel-mentorado.minha-conta.conexoes-mentores', compact('mentores'));
    }

    public function getConexoes(Request $request)
    {
        $mentorado = $request->session()->get('usuario.0');
        $mentorado = Mentorado::find($mentorado->id_mentorado);
        $mentores = array();
        $conexoes = $mentorado->conexoes()->join('tb_mentores', 'mentor_id_mentor', '=', 'id_mentor')->where('ds_status', '<', 3)->join('tb_assuntos', 'assunto_id_assunto', '=', 'id_assunto')->where('nm_mentor', 'like', '%' . $request->search . '%')->orderBy('id_conexao', 'desc');
        $count = $conexoes->count();
        $page = $request->page != null ? $request->page : 1;
        $mentores = $conexoes->limit(6)->offset(($page - 1) * 6)->get()->toArray();
        return array('dados' => $mentores, 'qtd' => ceil($count / 6));
    }

    public function mentoresAjax(Request $request)
    {
        $mentores = $this->getConexoes($request);
        return json_encode($mentores);
    }

    public function encerrar(Request $request)
    {
        $conexao = Conexao::find($request->conexao);
        $conexao->ds_status = 2;
        $conexao->update();
        return json_encode($conexao->toArray());
    }
}