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
        $mentor = $request->session()->get('usuario.0');
        $mentor = Mentor::find($mentor->id_mentor);
        $mentorados = array();
        $conexoes = $mentor->conexoes()->where('ds_status', '<', 3)->get();
        if($conexoes->count() > 0)
        {
            foreach($conexoes as $conexao);
            {
                $subArray = array();
                $subArray['dt_fim'] = date('d/m/Y h:i:s', strtotime($conexao->dt_fim));
                $subArray['dt_inicio'] = date('d/m/Y h:i:s', strtotime($conexao->dt_inicio));
                $subArray['ds_status'] = $conexao->ds_status;
                $subArray['id_conexao'] = $conexao->id_conexao;
                $subArray['id_mentorado'] = $conexao->mentorado->id_mentorado;
                $subArray['nm_mentorado'] = $conexao->mentorado->nm_mentorado;
                $subArray['ds_foto'] = $conexao->mentorado->ds_foto;
                $subArray['id_assunto'] = $conexao->assunto->id_assunto;
                $subArray['nm_assunto'] = $conexao->assunto->nm_assunto;
                $subArray['nm_carreira'] = $conexao->assunto->carreira->nm_carreira;
                $subArray['nm_profissao'] = $conexao->assunto->carreira->profissao->nm_profissao;
                $mentorados[] = $subArray;
            }
        }
        return view('painel-mentor.minha-conta.conexões-mentorados', compact('mentorados'));
    }

    public function aceitar(Request $request)
    {
        $conexao = Conexao::find($request->conexao);
        $conexao->ds_status = 1;
        $conexao->update();
        return json_encode("OK");
    }

    public function recusar(Request $request)
    {
        $conexao = Conexao::find($request->conexao);
        $conexao->delete();
        return json_encode("OK");
    }

    public function chamar(Request $request, $id)
    {
        $conexao = Conexao::find($id);
        $mentorado = $conexao->mentorado;
        $mentor = $conexao->mentor;
        $assunto = $conexao->assunto;
        $mensagens = $conexao->mensagens;
        dd($conexao);
    }
}
