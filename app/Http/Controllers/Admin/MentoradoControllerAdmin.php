<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Mentorado;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\UsuarioController;

class MentoradoControllerAdmin extends Controller
{
    public function index()
    {
        $mentorados = Mentorado::join('tb_usuarios', 'id_vinculo', '=', 'id_mentorado')->get();
        return view('admin.partes.mentorado.index', compact('mentorados'));
    }

    public function create()
    {
        return view('admin.partes.mentorado.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Mentorado::$regras, Mentorado::$mensagens);
        $mentorado = new Mentorado([
            'nm_mentorado' => $request->post('mentorado'),
        ]);

        try
        {
            $mentorado->save();
            UsuarioControllerAdmin::store($request->post('email'), $request->post('senha'), 1, $mentorado->id_mentorado, 1);
            return redirect('admin/mentorado')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao salvar mentorado');
        }
    }

    public function show($id)
    {
        $mentorado = Mentorado::find($id);
        return view('admin.partes.mentorado.show', compact('mentorado'));
    }

    public function edit($id)
    {
        $mentorado = Mentorado::find($id);
        return view('admin.partes.mentorado.edit', compact('mentorado'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Mentorado::$regras, Mentorado::$mensagens);
        $mentorado = Mentorado::find($id);
        $mentorado->nm_mentorado = $request->post('mentorado');
        try
        {
            $mentorado->update();
            return redirect('admin/mentorado/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->withErrors('Erro ao alterar mentorado')->withInput();
        }
    }

    public function destroy($id)
    {
        $mentorado = Mentorado::find($id);
        try
        {
            $mentorado->delete();
            return redirect('admin/mentorado/')->with('success', 'save');
        }
        catch(QueryException $ex)
        {
            return back()->with('erro', 'Erro ao deletar mentorado');
        }
    }
}
