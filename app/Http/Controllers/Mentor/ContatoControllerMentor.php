<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\Contato;
use function GuzzleHttp\json_encode;

class ContatoControllerMentor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function index(Request $request)
    {

        $mentor = $request->session()->get('usuario.0');
        $mentor = Mentor::find($mentor->id_mentor);
        $contatos = $mentor->contatos;
        foreach ($contatos as $contato) {
            if ($contato->tipo_contato == 'telegram' || $contato->tipo_contato == 'cel' || $contato->tipo_contato ==  'tel' || $contato->tipo_contato ==  'whats')
                $contato['link'] = $this->arrumaTelefone($contato->ds_contato, $contato->tipo_contato);
            else
                $contato['link'] = $this->dicionarioDeLinks[$contato->tipo_contato] . $contato->ds_contato;
            $contato['imagem'] = $this->dicionarioDeImagens[$contato->tipo_contato];
        }
        return view('painel-mentor.minha-conta.cadastrar-contato', compact('contatos'));
    }

    public function getAjax(Request $request)
    {
        $contato = Contato::find($request->contato);
        return json_encode($contato->toArray());
    }

    public function getAllAjax(Request $request)
    {
        $mentor = $request->session()->get('usuario.0');
        $mentor = Mentor::find($mentor->id_mentor);
        $contatos = $mentor->contatos;
        foreach ($contatos as $contato) {
            if ($contato->tipo_contato == 'telegram' || $contato->tipo_contato == 'cel' || $contato->tipo_contato ==  'tel' || $contato->tipo_contato ==  'whats')
                $contato['link'] = $this->arrumaTelefone($contato->ds_contato, $contato->tipo_contato);
            else
                $contato['link'] = $this->dicionarioDeLinks[$contato->tipo_contato] . $contato->ds_contato;
            $contato['imagem'] = $this->dicionarioDeImagens[$contato->tipo_contato];
        }
        return json_encode($contatos->toArray());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->alterar == "" || $request->alterar == null) {
            $this->validate($request, Contato::$regras, Contato::$mensagens);
            $mentor = $request->session()->get('usuario.0');
            $contato = new Contato([
                'tipo_contato' => $request->tipo,
                'ds_contato' => $request->contato,
                'mentor_id_mentor' => $mentor->id_mentor
            ]);
            $contato->save();
            return json_encode($contato->toArray());
        } else {
            $contato = Contato::find($request->alterar);
            $contato->tipo_contato = $request->tipo;
            if ($contato->tipo_contato == 'telegram' || $contato->tipo_contato == 'cel' || $contato->tipo_contato ==  'tel' || $contato->tipo_contato ==  'whats')
                $contato->ds_contato = str_replace('-', '', str_replace('(', '', str_replace(')', '', $request->contato)));
            else $contato->ds_contato = $request->contato;
            $contato->update();
            return json_encode($contato->toArray());
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