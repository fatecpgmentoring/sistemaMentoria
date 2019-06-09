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
            'assunto_id_assunto'=> intval($request->params["assunto"]),
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
        $conexao = Conexao::find(intval($request->params['conexao']));
        try
        {
            $conexao->delete();
            return json_encode('Ok');
        }
        catch(QueryException $ex)
        {
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
    public function update(Request $request, $id)
    {
        //
    }

    public function conexoes(Request $request)
    {
        $mentores = $this->getConexoes($request);
        return view('painel-mentorado.minha-conta.conexões-mentores', compact('mentores'));
    }

    public function getConexoes(Request $request)
    {
        $mentorado = $request->session()->get('usuario.0');
        $mentorado = Mentorado::find($mentorado->id_mentorado);
        $mentores = array();
        $conexoes = $mentorado->conexoes()->join('tb_mentores', 'mentor_id_mentor', '=', 'id_mentor')->where('ds_status', '<', 3)->where('nm_mentor', 'like', '%'.$request->search.'%' )->orderBy('id_conexao', 'desc');
        $count = $conexoes->get()->count();
        if($count > 0)
        {
            foreach($conexoes->limit(6)->offset(($request->page-1)*6)->get() as $conexao);
            {
                $subArray = array();
                $subArray['dt_fim'] = $conexao->dt_fim != null ? date('d/m/Y h:i:s', strtotime($conexao->dt_fim)) : null;
                $subArray['dt_inicio'] = $conexao->dt_inicio != null ? date('d/m/Y h:i:s', strtotime($conexao->dt_inicio)) : null;
                $subArray['ds_status'] = $conexao->ds_status;
                $subArray['id_conexao'] = $conexao->id_conexao;
                $subArray['id_mentor'] = $conexao->mentor->id_mentor;
                $subArray['nm_mentor'] = $conexao->mentor->nm_mentor;
                $subArray['ds_foto'] = $conexao->mentor->ds_foto;
                $subArray['id_assunto'] = $conexao->assunto->id_assunto;
                $subArray['nm_assunto'] = $conexao->assunto->nm_assunto;
                $subArray['nm_carreira'] = $conexao->assunto->carreira->nm_carreira;
                $subArray['nm_profissao'] = $conexao->assunto->carreira->profissao->nm_profissao;
                $mentores[] = $subArray;
            }
        }

        return array('dados' => $mentores, 'qtd' => $count);
    }

    public function mentoresAjax(Request $request)
    {
        $mentores = $this->getConexoes($request);
        return json_encode($mentores);
    }
}
