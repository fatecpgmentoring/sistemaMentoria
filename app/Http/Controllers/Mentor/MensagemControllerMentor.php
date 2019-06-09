<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conexao;

class MensagemControllerMentor extends Controller
{
    public function chamarId(Request $request, $id)
    {
        $conexao = Conexao::find($id);
        $mentorado = $conexao->mentorado;
        $mentor = $conexao->mentor;
        $mensagens = $conexao->mensagens;
        $conexoes = array();
        foreach($conexao->mentor->conexoes as $conexaoOne)
        {
            $conexoes[] = $conexaoOne->mentorado;
        }
        return view('painel-mentor.chat.chat-mentor', compact('conexao', 'mentorado', 'mentor', 'mensagens', 'conexoes'));
    }

    public function chamar(Request $request)
    {
        $conexao = Conexao::find($id);
        $mentorado = $conexao->mentorado;
        $mentor = $conexao->mentor;
        $assunto = $conexao->assunto;
        $mensagens = $conexao->mensagens;
        return view('painel-mentor.chat.chat-mentor');
    }
}
