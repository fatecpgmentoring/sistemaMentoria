<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;

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
        foreach($mentor->conexoes()->where('ds_status', '<', 3)->get() as $conexao);
        {
            $subArray = array();
            $subArray['dt_fim'] = date('d/m/Y h:i:s', strtotime($conexao->dt_fim));
            $subArray['dt_inicio'] = date('d/m/Y h:i:s', strtotime($conexao->dt_inicio));
            $subArray['ds_status'] = $conexao->ds_status;
            $subArray['nm_mentorado'] = $conexao->mentorado->nm_mentorado;
            $subArray['ds_foto'] = $conexao->mentorado->ds_foto;
            $subArray['nm_assunto'] = $conexao->assunto->nm_assunto;
            $subArray['nm_carreira'] = $conexao->assunto->carreira->nm_carreira;
            $subArray['nm_profissao'] = $conexao->assunto->carreira->profissao->nm_profissao;
            $mentorados[] = $subArray;
        }
        return view('painel-mentor.minha-conta.conexões-mentorados', compact('mentorados'));
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
