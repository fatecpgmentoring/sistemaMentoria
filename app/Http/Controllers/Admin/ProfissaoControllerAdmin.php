<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profissao;

class ProfissaoControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissoes = Profissao::all();
        return view('admin.partes.profissao.index', compact('profissoes'));

    }

    public function create()
    {
        return view('admin.partes.profissao.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Profissao::$regras, Profissao::$mensagens);
        $profissao = new Profissao([
            'nm_profissao' => $request->post('profissao'),
            'ds_active_profissao' => 1,
            'profissao_log' => 'Cadastrado pelo admin'
        ]);

        try
        {
            $profissao->save();
            return redirect('admin/profissao/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar profissao')->withInput();
        }
    }

    public function show($id)
    {
        $profissao = Profissao::find($id);
        return view('admin.partes.profissao.show', compact('profissao'));
    }

    public function edit($id)
    {
        $profissao = Profissao::find($id);
        return view('admin.partes.profissao.show', compact('profissao'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Profissao::$regras, Profissao::$mensagens);
        $profissao = Profissao::find($id);
        $profissao->nm_assunto = $request->post('profissao');
        try
        {
            $profissao->update();
            return redirect('admin/profissao/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar profissao')->withInput();
        }
    }

    public function activeOrDesactive($id)
    {
        $profissao = Profissao::find($id);
        $profissao->ds_active_assunto = $profissao->ds_active_assunto ? 0 : 1;
        try
        {
            $profissao->update();
            return json_encode(['success' => 'save']);
        }
        catch(QueryException $ex)
        {
            return json_encode(['error' => $ex]);
        }
    }

    public function destroy($id)
    {
        $profissao = Profissao::find($id);
        try
        {
            $profissao->delete();
            return redirect('admin/profissao/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao deletar profissao');
        }
    }
}
