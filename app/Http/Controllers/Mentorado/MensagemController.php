<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conexao;
use App\Mensagem;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chamar(Request $request)
    {
        return view('painel-mentorado.chat.chat-mentorado');
    }

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
        foreach ($conexao->mentorado->conexoes as $conexaoOne) {
            if ($conexaoOne->ds_status == 1) {
                $subconexao = array();
                $subconexao['id_conexao'] = $conexaoOne->id_conexao;
                $subconexao['ds_foto'] = $conexaoOne->mentor->ds_foto;
                $subconexao['nm_mentor'] = $conexaoOne->mentor->nm_mentor;
                $conexoes[] = $subconexao;
            }
        }
        return view('painel-mentorado.chat.chat-mentorado', compact('conexao', 'mentorado', 'mentor', 'mensagens', 'conexoes'));
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