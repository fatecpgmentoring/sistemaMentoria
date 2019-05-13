<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Contato;

class ContatoControllerAdmin extends Controller
{
    public function index()
    {
        $contatos = Contato::all();
        return view('admin.partes.contato.index', compact('contatos'));
    }

    public function create()
    {
        return view('admin.partes.contato.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Contato::$regras, Contato::$mensagens);
        $contato = new Contato([
            'tipo_contato' => $request->post('tipo'),
            'ds_contato' => $request->post('contato'),
            'carreira_id_carreira' => $request->post('mentor')
        ]);

        try
        {
            $contato->save();
            return redirect('admin/contato/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar contato')->withInput();
        }
    }

    public function show($id)
    {
        $contato = Contato::find($id);
        return view('admin.partes.contato.show', compact('contato'));
    }

    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('admin.partes.contato.edit', compact('contato'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Contato::$regras, Contato::$mensagens);
        $contato = Contato::find($id);
        $contato->ds_contato = $request->post('contato');
        try
        {
            $contato->update();
            return redirect('admin/contato/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar contato')->withInput();
        }
    }

    public function destroy($id)
    {
        $contato = Contato::find($id);
        try
        {
            $contato->delete();
            return redirect('admin/contato/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->with('erro','Erro ao deletar contato');
        }
    }
}
