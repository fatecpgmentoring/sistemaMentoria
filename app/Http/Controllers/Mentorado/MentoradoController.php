<?php

namespace App\Http\Controllers\Mentorado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Mentorado;
use App\Mentor;

class MentoradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentores = $this->getMentores();
        return view('painel-mentorado.dashboard-mentorado', compact('mentores'));
    }

    public function selecionaMentores($mentores, $assuntos)
    {
        $mentoresArray = array();
        foreach ($mentores as $mentor) {
            if($mentor->usuario->assuntos()->whereIn('id_assunto', $assuntos)->count() > 0  && count($mentoresArray) < 6)
            $mentoresArray[] = $mentor;
        }
        return $mentoresArray;
    }

    public function getMentores()
    {
        $assuntos = array();
        foreach (Auth::user()->assuntos as $assunto) {
            $assuntos[] = $assunto->id_assunto;
        }
        $mentores = Mentor::orderBy('vl_nota', 'desc')->get();
        $mentores = $this->selecionaMentores($mentores, $assuntos);
        return $mentores;
    }


    public function mentorListagem(Request $request)
    {
        $mentores = new Mentor;
        $mentores = $mentores->join('tb_usuarios', 'usuario_id_usuario', '=', 'id_usuario')->where('cd_role', '=', 2)->where('cd_status', '=', 1)->where('nm_mentor', 'like', '%'.$request->search.'%' )->orderBy('vl_nota', 'desc');
        $count = $mentores->get()->count();
        $mentoresAExibir = array();
        foreach($mentores->limit(6)->offset(($request->page-1)*6)->get() as $linhaMentor)
        {
            $subMentoresAExbir = array();
            $subMentoresAExbir['id_mentor'] = $linhaMentor->id_mentor;
            $subMentoresAExbir['nm_mentor'] = $linhaMentor->nm_mentor;
            $subMentoresAExbir['vl_nota'] = $linhaMentor->vl_nota;
            $subMentoresAExbir['nv_conhecimento'] = $linhaMentor->nv_conhecimento;
            $subMentoresAExbir['ds_foto'] = $linhaMentor->ds_foto;
            $mentoresAExibir[] = $subMentoresAExbir;
        }
        return json_encode(array('dados' => $mentoresAExibir, 'qtd' => ceil($count/6)));
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
