<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Assunto;
use Illuminate\Facedes\Support\Auth;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Carreira;

class AssuntoControllerAdmin extends Controller
{
    public function index()
    {
        $assuntos = Assunto::all();
        return view('admin.partes.assunto.index', compact('assuntos'));
    }

    public function create()
    {
        $carreiras = Carreira::all();
        return view('admin.partes.assunto.create', compact('carreiras'));
    }

    public function store(Request $request)
    {
        $this->validate($request, Assunto::$regras, Assunto::$mensagens);
        $assunto = new Assunto([
            'nm_assunto' => $request->post('assunto'),
            'carreira_id_carreira' => $request->post('carreira'),
            'ds_active_assunto' => 1,
            'assunto_log' => 'Criado pelo admin'
        ]);

        try
        {
            $assunto->save();
            return redirect('admin/assunto/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar assunto')->withInput();
        }
    }

    public function show($id)
    {
        $assunto = Assunto::find($id);
        return view('admin.partes.assunto.show', compact('assunto'));
    }

    public function edit($id)
    {
        $assunto = Assunto::find($id);
        $carreiras = Carreira::all();
        return view('admin.partes.assunto.edit', compact('assunto', 'carreiras'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Assunto::$regras, Assunto::$mensagens);
        $assunto = Assunto::find($id);
        $assunto->nm_assunto = $request->post('assunto');
        try
        {
            $assunto->update();
            return redirect('admin/assunto/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar assunto')->withInput();
        }
    }

    public function activeOrDesactive($id)
    {
        $assunto = Assunto::find($id);
        $assunto->ds_active_assunto = $assunto->ds_active_assunto ? 0 : 1;
        try
        {
            $assunto->update();
            return back();
        }
        catch(QueryException $ex)
        {
            return back();
        }
    }

    public function destroy($id)
    {
        $assunto = Assunto::find($id);
        try
        {
            $assunto->delete();
            return redirect('admin/assunto/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->with('erro','Erro ao deletar assunto');
        }
    }
}
