<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use App\Mentorado;
use Illuminate\Support\Facades\Hash;

class SiteController extends Controller
{
    public $dicionarioDeImagens = [
        'link' => "/images/icones/linkedin.png",
        'whats' => '/images/icones/zap.png',
        'face' => '/images/icones/fb.png',
        'telegram' => '/images/icones/teleg.png',
        'insta' => '/images/icones/insta.png',
        'tel' => '/images/icones/tele.png',
        'cel' => '/images/icones/cel.png',
        'email' => '/images/icones/mail.png',
        'other' => '/images/icones/outro.png'
    ];

    public $dicionarioDeLinks = [
        'link' => "https://www.linkedin.com/in/",
        'whats' => 'https://wa.me/',
        'face' => 'https://www.facebook.com/',
        'telegram' => 'tel:',
        'insta' => 'https://instagram.com/',
        'tel' => 'tel:',
        'cel' => 'tel:',
        'email' => 'mailto:',
        'other' => '/images/icones/outro.png'
    ];

    public function Valida(Request $request)
    {
        if ($request->queroser == "true") return [
            'email' => 'bail|required|email|min:10|max:100|unique:tb_usuarios,email',
            'senha' => 'bail|required|min:8|max:100|confirmed',
            'nome' => 'bail|required|min:3|max:100',
            'conhecimento' => 'required'
        ];
        else return [
            'email' => 'bail|required|email|min:10|max:100|unique:tb_usuarios,email',
            'senha' => 'bail|required|min:8|max:100|confirmed',
            'nome' => 'bail|required|min:3|max:100'
        ];
    }

    public $mensagem = [
        'email.required' => 'E-mail obrigatorio',
        'email.email' => 'E-mail invalido',
        'email.min' => 'E-mail muito pequeno',
        'email.max' => 'E-mail muito grande',
        'email.unique' => 'E-mail já utilizado',
        'senha.required' => 'Senha obrigatoria',
        'senha.min' => 'Senha muito pequena',
        'senha.max' => 'Senha muito grande',
        'senha.confirmed' => 'Senhas não conferem',
        'nome.required' => 'Nome obrigatorio',
        'nome.min' => 'Nome muito pequeno',
        'nome.max' => 'Nome muito grande',
        'conhecimento.required' => 'Conhecimento obrigatorio'
    ];
    public function index(Request $request)
    {
        $mentores = Mentor::orderBy('vl_nota', 'desc')->limit(6)->get();
        return view('site.homepage.index', compact('mentores'));
    }

    public function cadastro(Request $request)
    {
        $this->validate($request, $this->Valida($request), $this->mensagem);
        $id_user = $this->salvarUser($request);
        if ($request->queroser == "true") {
            $extension = str_replace('.', '', strstr($_FILES['foto']['name'], '.'));
            $destino = 'images/usuarios/' . round(microtime(true) * 1000) . "." . $extension;
            $arquivo_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $destino);
            $user = new Mentor([
                'nm_mentor' => $request->post('nome'),
                'nv_conhecimento' => $request->post('conhecimento'),
                'vl_nota' => 5.0,
                'usuario_id_usuario' => $id_user,
                'ds_foto' => $destino
            ]);
        } else {
            $extension = str_replace('.', '', strstr($_FILES['foto']['name'], '.'));
            $destino = 'images/usuarios/' . round(microtime(true) * 1000) . "." . $extension;
            $arquivo_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($arquivo_tmp, $destino);
            $user = new Mentorado([
                'nm_mentorado' => $request->post('nome'),
                'usuario_id_usuario' => $id_user,
                'ds_foto' => $destino
            ]);
        }
        try {
            $user->save();
            Auth::loginUsingId($id_user);
            $request->session()->push('usuario', $user);
            return redirect($request->conhecimento == "true" ? '/mentor' : '/mentorado')->with('success', 'save');
        } catch (QueryException $ex) {
            return back()->withErrors('Erro ao salvar mentor')->withInput();
        }
    }

    public function salvarUser(Request $request)
    {
        $usuario = new Usuario([
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('senha')),
            'cd_role' => $request->queroser == "true" ? 2 : 1,
            'cd_status' => 1,
        ]);

        try {
            $usuario->save();
            return $usuario->id_usuario;
        } catch (QueryException $ex) {
            return 0;
        }
    }

    public function logIn(Request $request)
    {
        $this->validate($request, Usuario::$regras, Usuario::$mensagens);
        $usuario = Usuario::where('email', $request->email)->first();
        $credenciais = $request->only('email', 'password');
        if (Auth::attempt($credenciais)) {
            if ($usuario->cd_role == 2) {
                $mentor = Mentor::where('usuario_id_usuario', $usuario->id_usuario)->first();
                $request->session()->push('usuario', $mentor);
                return redirect('/mentor');
            } else if ($usuario->cd_role == 1) {
                $mentorado = Mentorado::where('usuario_id_usuario', $usuario->id_usuario)->first();
                $request->session()->push('usuario', $mentorado);
                return redirect('/mentorado');
            } else
                return redirect('/admin');
        } else {
            return redirect('/login')->with('failure', 'Senha incorreta');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }

    public function showMentor($id)
    {
        $mentor = Mentor::find($id);
        $count =  ceil($mentor->comentarios->count() / 6);
        $comentarios = $mentor->comentarios()->limit(6)->get();;
        foreach ($comentarios as $comentario) {
            $comentario['ds_foto'] = $comentario->mentorado->ds_foto;
            $comentario['nm_mentorado'] = $comentario->mentorado->nm_mentorado;
            $comentario['criado_em'] = date('d/m/Y H:i:s', strtotime("-3 hours",  strtotime($comentario->updated_at)));
        }
        $contatos = $mentor->contatos;
        foreach ($contatos as $contato) {
            if ($contato->tipo_contato == 'telegram' || $contato->tipo_contato == 'cel' || $contato->tipo_contato ==  'tel' || $contato->tipo_contato ==  'whats')
                $contato['link'] = $this->arrumaTelefone($contato->ds_contato, $contato->tipo_contato);
            else
                $contato['link'] = $this->dicionarioDeLinks[$contato->tipo_contato] . $contato->ds_contato;
            $contato['imagem'] = $this->dicionarioDeImagens[$contato->tipo_contato];
        }
        $contatos = $contatos->toArray();
        return view('site.showMentor', compact('mentor', 'comentarios', 'count', 'contatos'));
    }

    public function arrumaTelefone($telefone, $tipo)
    {
        if (strlen($telefone) == 11 || strlen($telefone) == 10) {
            return $this->dicionarioDeLinks[$tipo] . ($tipo == 'whats' ? '' : '+') . '55' . $telefone;
        } else if (strlen($telefone) == 13) {
            return $this->dicionarioDeLinks[$tipo] . ($tipo == 'whats' ? '' : '+') . $telefone;
        } else {
            return $this->dicionarioDeLinks[$tipo] . ($tipo == 'whats' ? str_replace('+', '', $telefone) : $telefone);
        }
    }

    public function comentarioAray(Request $request)
    {
        $mentor = $request->session()->get('usuario.0');
        $mentor = Mentor::find($mentor->id_mentor);
        $count =  ceil($mentor->comentarios->count() / 6);
        $page = $request->page != null ? $request->page : 1;
        $comentarios = $mentor->comentarios()->limit(6)->offset(($page - 1) * 6)->get();;
        date_default_timezone_set('America/Sao_Paulo');
        foreach ($comentarios as $comentario) {
            $comentario['ds_foto'] = $comentario->mentorado->ds_foto;
            $comentario['nm_mentorado'] = $comentario->mentorado->nm_mentorado;
            $comentario['criado_em'] = date('d/m/Y H:i:s', strtotime("-3 hours",  strtotime($comentario->updated_at)));
        }
        return json_encode(array('dados' => $comentarios->toArray(), 'qtd' => $count));
    }

    public function mentoresAll()
    {
        $mentores = Mentor::all();
        return view('site.allMentores', compact('mentores'));
    }

    public function mentorListagem(Request $request)
    {
        $mentores = new Mentor;
        $mentores = $mentores->join('tb_usuarios', 'usuario_id_usuario', '=', 'id_usuario')->where('cd_role', '=', 2)->where('cd_status', '=', 1)->where('nm_mentor', 'like', '%' . $request->search . '%')->orderBy('vl_nota', 'desc');
        $count = $mentores->get()->count();
        $mentoresAExibir = array();
        foreach ($mentores->limit(12)->offset(($request->page - 1) * 12)->get() as $linhaMentor) {
            $subMentoresAExbir = array();
            $subMentoresAExbir['id_mentor'] = $linhaMentor->id_mentor;
            $subMentoresAExbir['nm_mentor'] = $linhaMentor->nm_mentor;
            $subMentoresAExbir['vl_nota'] = $linhaMentor->vl_nota;
            $subMentoresAExbir['nv_conhecimento'] = $linhaMentor->nv_conhecimento;
            $subMentoresAExbir['ds_foto'] = $linhaMentor->ds_foto;
            $mentoresAExibir[] = $subMentoresAExbir;
        }
        return json_encode(array('dados' => $mentoresAExibir, 'qtd' => ceil($count / 12)));
    }
}