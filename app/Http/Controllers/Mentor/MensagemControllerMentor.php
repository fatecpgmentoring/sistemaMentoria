<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conexao;
use App\Mensagem;

class MensagemControllerMentor extends Controller
{
    public function chamarId(Request $request, $id)
    {
        $conexao = Conexao::find($id);
        $mentorado = $conexao->mentorado;
        $mentor = $conexao->mentor;
        $mensagens = array();
        foreach ($conexao->mensagens as $mensagem) {
            $subMensagem = array();
            $subMensagem['message'] = $mensagem->ds_mensagem;
            $subMensagem['quem'] = $mensagem->id_flag;
            $mensagens[] = $subMensagem;
        }
        $conexoes = array();
        foreach ($conexao->mentor->conexoes as $conexaoOne) {
            $subconexao = array();
            $subconexao['id_conexao'] = $conexaoOne->id_conexao;
            $subconexao['ds_foto'] = $conexaoOne->mentorado->ds_foto;
            $subconexao['nm_mentorado'] = $conexaoOne->mentorado->nm_mentorado;
            $conexoes[] = $subconexao;
        }
        return view('painel-mentor.chat.chat-mentor', compact('conexao', 'mentorado', 'mentor', 'mensagens', 'conexoes'));
    }

    public function store(Request $request)
    {
        $conexao = intval($request->conexao);
        $mensagem = $request->mensagem;
        $id_flag = $request->msgpor;
        $mensagemSalvar = new Mensagem([
            'ds_mensagem' => $mensagem,
            'id_flag' => $id_flag,
            'conexao_id_conexao' => $conexao
        ]);
        $mensagemSalvar->save();
    }
}