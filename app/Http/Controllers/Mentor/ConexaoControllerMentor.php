<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\Conexao;
use function GuzzleHttp\json_encode;

class ConexaoControllerMentor extends Controller
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

    public function conexoes(Request $request)
    {
        $mentorados = $this->getConexoes($request);
        return view('painel-mentor.minha-conta.conexões-mentorados', compact('mentorados'));
    }
    
    public function getConexoes(Request $request)
    {
        $mentor = $request->session()->get('usuario.0');
        $mentor = Mentor::find($mentor->id_mentor);
        $mentorados = array();
        $conexoes = $mentor->conexoes()->join('tb_mentorados', 'mentorado_id_mentorado', '=', 'id_mentorado')->join('tb_assuntos', 'assunto_id_assunto', '=', 'id_assunto')->where('ds_status', '<', 3)->where('nm_mentorado', 'like', '%'.$request->search.'%' )->orderBy('id_conexao', 'desc');
        $count = $conexoes->get()->count();
        $page = $request->page != null ? $request->page : 1;
        $conexoes = $conexoes->limit(6)->offset(($page-1)*6)->get();
        $mentorados = $conexoes->toArray();
        return array('dados' => $mentorados, 'qtd' => ceil($count/6));
    }
    public function aceitar(Request $request)
    {
        $conexao = Conexao::find($request->conexao);
        $conexao->ds_status = 1;
        $data = date('Y-m-d h:i:s');
        $conexao->dt_inicio = $data;
        $conexao->dt_fim = date('Y-m-d h:i:s', strtotime("+1 month",strtotime($data)));
        $conexao->update();
        return json_encode("OK");
    }

    public function recusar(Request $request)
    {
        $conexao = Conexao::find($request->conexao);
        $conexao->delete();
        return json_encode("OK");
    }

    public function mentoradosAjax(Request $request)
    {
        $mentorados = $this->getConexoes($request);
        return json_encode($mentorados);
    }
}
