<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Assunto;
use Illuminate\Facedes\Support\Auth;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class AssuntoControllerAdmin extends Controller
{
    public function index()
    {
        $assuntos = Assunto::all();
        return view('', compact('assuntos'));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $this->validate($request, Assunto::$regras, Assunto::$mensagens);
        $assunto = new Assunto([
            'nm_assunto' => $request->post('assunto'),
            'id_assunto_carreira' => $request->post('carreira'),
            'ds_active_assunto' => 1
        ]);

        try
        {
            $assunto->save();
            return redirect('')->with('success', '');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar assunto');
        }
    }

    public function show($id)
    {
        $assunto = Assunto::find($id);
        return view('', compact('assunto'));
    }

    public function edit($id)
    {
        $assunto = Assunto::find($id);
        return view('', compact('assunto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Assunto::$regras, Assunto::$mensagens);
        $assunto = Assunto::find($id);
        $assunto->nm_assunto = $request->post('assunto');
        try
        {
            $assunto->update();
            return redirect('')->with('success', '');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar assunto');
        }
    }

    public function activeOrDesactive(Request $request, $id)
    {
        $this->validate($request, Assunto::$regras, Assunto::$mensagens);
        $assunto = Assunto::find($id);
        $assunto->ds_active_assunto = $assunto->ds_active_assunto ? 0 : 1;
        try
        {
            $assunto->update();
            return redirect('')->with('success', '');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao ', $assunto->ds_active_assunto ? 'desativar' : 'ativar'. ' assunto');
        }
    }

    public function destroy($id)
    {
        $assunto = Assunto::find($id);
        try
        {
            $assunto->delete();
            return redirect('')->with('success', '');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao deletar assunto');
        }
    }
}
