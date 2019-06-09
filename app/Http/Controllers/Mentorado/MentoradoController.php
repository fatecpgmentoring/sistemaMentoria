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
    public function index(Request $request)
    {
        $mentores = $this->getMentores($request);
        $qtd = ceil(count($mentores) / 6);
        return view('painel-mentorado.dashboard-mentorado', compact('mentores', 'qtd'));
    }

    public function selecionaMentores($mentores, $assuntos)
    {
        $mentoresArray = array();
        foreach ($mentores as $mentor) {
            $count = $mentor->usuario->assuntos()->whereIn('id_assunto', $assuntos)->count();
            if ($count > 0  && count($mentoresArray) < 6) {
                $cont = 0;
                $assuntosText = "";
                $assuntoArray = array();
                foreach ($mentor->usuario->assuntos()->whereIn('id_assunto', $assuntos)->get() as $assunto) {
                    if ($cont == 0) $assuntosText .= $assunto->nm_assunto;
                    else if ($count > 1 && $cont == ($count - 1)) $assuntosText .= " e " . $assunto->nm_assunto . ".";
                    else $assuntosText .= ", " . $assunto->nm_assunto;
                    $assuntoArray[] = $assunto;
                    $cont++;
                }
                $mentor->assuntos = $assuntosText;
                $mentor->assuntosSeparados = $assuntoArray;
                $mentoresArray[] = $mentor;
            }
        }
        return $mentoresArray;
    }

    public function getMentores(Request $request)
    {
        $assuntos = array();
        foreach (Auth::user()->assuntos as $assunto) {
            $assuntos[] = $assunto->id_assunto;
        }
        $mentores = Mentor::orderBy('vl_nota', 'desc');
        $mentores = $mentores->whereNotIn('id_mentor', $this->getConexoes($request))->get();
        $mentores = $this->selecionaMentores($mentores, $assuntos);
        return $mentores;
    }


    public function mentorListagem(Request $request)
    {
        $mentores = new Mentor;
        $mentores = $mentores->join('tb_usuarios', 'usuario_id_usuario', '=', 'id_usuario')->where('cd_role', '=', 2)->where('cd_status', '=', 1)->where('nm_mentor', 'like', '%' . $request->search . '%')->orderBy('vl_nota', 'desc');
        $count = $mentores->count();
        $mentores = $mentores->limit(6)->offset(($request->page - 1) * 6)->get()->toArray();
        return json_encode(array('dados' => $mentores, 'qtd' => ceil($count / 6)));
    }

    public function getConexoes(Request $request)
    {
        $conexoesArray = array();
        $mentoradoSessao = $request->session()->get('usuario.0');
        $mentorado = Mentorado::find($mentoradoSessao->id_mentorado);
        foreach ($mentorado->conexoes as $conexao) {
            $conexoesArray[] = $conexao->mentor_id_mentor;
        }
        return $conexoesArray;
    }
}